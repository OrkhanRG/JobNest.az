<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseExport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:export {filename?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export the database to database/exports folder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $db   = config('database.connections.mysql.database');
        $user = config('database.connections.mysql.username');
        $pass = config('database.connections.mysql.password');
        $host = config('database.connections.mysql.host');

        $filename = $this->argument('filename') ?? 'backup_' . date('Y_m_d_His') . '.sql';
        $filePath = base_path("database/exports/{$filename}");

        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0755, true);
        }

        $mysqldump = 'C:\\laragon\\bin\\mysql\\mysql-8.0.30-winx64\\bin\\mysqldump.exe';

        $descriptors = [
            1 => ['file', $filePath, 'w'],
            2 => ['pipe', 'w'],
        ];

        $process = proc_open(
            "\"$mysqldump\" -h {$host} -u {$user} -p\"{$pass}\" {$db}",
            $descriptors,
            $pipes
        );

        if (is_resource($process)) {
            $stderr = stream_get_contents($pipes[2]);
            fclose($pipes[2]);

            $return_value = proc_close($process);

            if ($return_value !== 0) {
                $this->error("Database backup failed. Error: $stderr");
            } else {
                $this->info("Database backup success: $filePath");
            }
        }
    }
}
