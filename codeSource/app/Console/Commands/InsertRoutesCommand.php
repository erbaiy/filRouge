<?php

namespace App\Console\Commands;

use App\Models\Route;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InsertRoutesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'routes:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $routes = app('router')->getRoutes();
        $routeData = [];

        foreach ($routes as $route) {
            $uri = $route->uri();

            // Skip routes containing '-' or 'api'
            if (strpos($uri, '-') !== false || strpos($uri, 'api') !== false) {
                continue;
            }
            // dd($uri);  

            $routeData[] = [
                'uri' => $uri,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Route::insert($routeData);

        $this->info('Routes inserted successfully.');
    }
}
