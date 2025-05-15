<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a custom service class in app/Http/Services';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("/Http/Services/${name}.php");

        if (File::exists($path)) {
            $this->error("Service ${name} already exists!");
            return;
        }

        File::ensureDirectoryExists(app_path("Http/Services"));
        File::put($path, "<?php

namespace App\Http\Services;

class {$name}
{
    //
}");

        $this->info("Service {$name} created successfully at app/Http/Services.");
    }
}
