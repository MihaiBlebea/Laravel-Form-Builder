<?php

namespace MihaiBlebea\FormBuilder;

use Illuminate\Support\ServiceProvider;
use MihaiBlebea\FormBuilder\Commands\FormBuilderCommand;


class FormBuilderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'formbuilder');

        $this->publishes([
            __DIR__ . '/../config/form-builder.php' => config_path('form-builder.php'),
            __DIR__ . '/../resources/views' => resource_path('views/vendor/form-builder')
        ]);

        if($this->app->runningInConsole())
        {
            $this->commands([
                FormBuilderCommand::class,
            ]);
        }
    }

    public function register()
    {
        // Register the Facade
        $this->app->bind('FormBuilder', function() {
            return new \MihaiBlebea\FormBuilder\FormBuilder;
        });
    }
}
