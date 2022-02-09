<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/{any}', static function () {
    return view('index');
})->where('any', '.*');
