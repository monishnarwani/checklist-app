<?php

namespace Checklist;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ChecklistServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerPublishables();

    }

    public function boot()
    {
        Schema::defaultStringLength(191);

        // load the routes file
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadViewsFrom(__DIR__.'/./../resources/views', 'Checklist');
    }

    private function registerPublishables()
    {
        // get the base path
        $basePath = dirname(__DIR__);

        $arrPublishable = [
            'migrations' => [
                "$basePath/publishable/database/migrations" => database_path('migrations'),
            ],
            'config' => [
                "$basePath/publishable/config/content.php" => config_path('content.php'),
            ],
            'aasets' => [
                "$basePath/resources/assets/js/content" => base_path('resources/assets/js/components/content'),
            ]
        ];

        foreach ($arrPublishable as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }
}