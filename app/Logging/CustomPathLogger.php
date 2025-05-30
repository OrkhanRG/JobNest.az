<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Illuminate\Support\Facades\File;

class CustomPathLogger
{
    public function __invoke(array $config): Logger
    {
        $now = now();
        $year = $now->format('Y');
        $month = $now->format('m');
        $day = $now->format('d');

        $logDirectory = storage_path("logs/custom-errors/{$year}/{$month}");
        $logFile = "{$logDirectory}/{$day}.log";

        if (!File::exists($logDirectory)) {
            File::makeDirectory($logDirectory, 0775, true);
        }

        $logger = new Logger('custom_error');
        $logger->pushHandler(new StreamHandler($logFile, Logger::DEBUG));

        return $logger;
    }
}
