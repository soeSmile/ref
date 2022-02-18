<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

use function exec;
use function trim;

/**
 * Class RunWhoIsExec
 */
class RunWhoIsExec extends Command
{
    /**
     * @var string
     */
    protected $signature = 'whois:exec';

    /**
     * @var string
     */
    protected $description = 'Run whois exec';

    /**
     * @return void
     */
    public function handle(): void
    {
        $domains = ['myref.top', 'trelo.com'];

        foreach ($domains as $domain) {
            $output = $data = [];
            exec('whois ' . $domain, $output, $result);

            if (!$result) {
                $data = $this->parseResult($output);
            }
        }
    }

    /**
     * @param array $data
     * @return array
     */
    private function parseResult(array $data): array
    {
        $result = [];

        foreach ($data as $item) {
            preg_match('/(.+?):(.+)/', $item, $array);

            $key = trim($array !== [] ? $array[1] : $item, ' \n\r\t\v\x00<>"');
            $value = trim($array !== [] ? $array[2] : $item, ' \n\r\t\v\x00<>"');

            $result[$key] = $value;
        }

        return $result;
    }
}
