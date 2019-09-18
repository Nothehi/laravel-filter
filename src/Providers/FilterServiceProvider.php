<?php

namespace HChamran\LaravelFilter\Providers;

use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    protected $commands = [
      'HChamran\LaravelFilter\Commands\FilterMakeCommand'
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
        $this->mergeConfigFrom(__DIR__ . '/../Config/filter.php', 'filter');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../Config/filter.php' => config_path('filter.php'),
        ]);
    }
}
