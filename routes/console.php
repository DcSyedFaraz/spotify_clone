<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('reports:generate-transparency')
    ->monthlyOn(1, '00:00')
    // ->everySecond()
    ->description('Generate and send transparency reports to all artists monthly');
