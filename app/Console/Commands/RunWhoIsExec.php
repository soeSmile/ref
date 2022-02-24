<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

use function array_key_exists;
use function exec;
use function in_array;
use function preg_match;
use function strtolower;
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
     * @var array
     */
    private const MAPPING = [
        'domain name'                            => 'name',
        'domain'                                 => 'name',
        'registry domain id'                     => 'domain_id',
        'registrar'                              => 'registrar',
        'creation date'                          => 'created_date',
        'created'                                => 'created_date',
        'updated date'                           => 'updated_date',
        'registrar registration expiration date' => 'expire_date',
        'registry expiry date'                   => 'expire_date',
        'free-date'                              => 'expire_date',
    ];

    /**
     * @var array
     */
    private const DATE_FIELD = [
        'created_date',
        'updated_date',
        'expire_date'
    ];

    /**
     * @return void
     */
    public function handle(): void
    {
        $domains = ['myref.top', 'trelo.com', 'ya.ru', 'ok.ru', 'mir.ru', 'yandex.ru', 'google.com'];
        $data = [];

        foreach ($domains as $domain) {
            $output = [];
            exec('whois ' . $domain, $output, $result);

            if (!$result) {
                $data[$domain] = $this->parseResult($output);
            }
        }

        $save = $data;
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

            if ($array !== []) {
                $key = strtolower(trim($array[1]));
                $value = trim($array[2]);

                if (array_key_exists($key, self::MAPPING)) {
                    $field = self::MAPPING[$key];
                    $result[$field] = in_array($field, self::DATE_FIELD, true) ? Carbon::parse($value) : $value;
                }
            }
        }

        return $result;
    }
}
