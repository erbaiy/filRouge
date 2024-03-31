<?php

namespace App\Console\Commands;

use App\Models\Route;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route as FacadesRoute;

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
    protected $description = 'Insert routes into the database';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Fetch all routes from web.php
        $routeCollection = FacadesRoute::getRoutes();

        foreach ($routeCollection as $route) {
            $uri = $route->uri();
            if (strpos($uri, '-') !== false || strpos($uri, 'api') !== false) {
                continue;
            }
            Route::create([
                'uri' => $uri,
            ]);
        }

        $this->info('Routes inserted successfully!');
    }
}
