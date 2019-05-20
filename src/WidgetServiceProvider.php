<?php

namespace Viviniko\Widget;

use Illuminate\Support\ServiceProvider;
use Viviniko\Widget\Console\Commands\WidgetTableCommand;

class WidgetServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__ . '/../config/widget.php' => config_path('widget.php'),
        ]);

        // Register commands
        $this->commands('command.widget.table');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/widget.php', 'widget');

        $this->registerRepositories();

        $this->registerService();

        $this->registerCommands();
    }

    protected function registerRepositories()
    {
        $this->app->singleton(
            \Viviniko\Widget\Repositories\WidgetGroup\WidgetGroupRepository::class,
            \Viviniko\Widget\Repositories\WidgetGroup\EloquentWidgetGroup::class
        );

        $this->app->singleton(
            \Viviniko\Widget\Repositories\WidgetModel\WidgetModelRepository::class,
            \Viviniko\Widget\Repositories\WidgetModel\EloquentWidgetModel::class
        );

        $this->app->singleton(
            \Viviniko\Widget\Repositories\WidgetModelField\WidgetModelFieldRepository::class,
            \Viviniko\Widget\Repositories\WidgetModelField\EloquentWidgetModelField::class
        );

        $this->app->singleton(
            \Viviniko\Widget\Repositories\Widget\WidgetRepository::class,
            \Viviniko\Widget\Repositories\Widget\EloquentWidget::class
        );

        $this->app->singleton(
            \Viviniko\Widget\Repositories\WidgetItem\WidgetItemRepository::class,
            \Viviniko\Widget\Repositories\WidgetItem\EloquentWidgetItem::class
        );
    }

    private function registerService()
    {
        $this->app->singleton('widget', \Viviniko\Widget\WidgetFactory::class);

        $this->app->alias('widget', \Viviniko\Widget\Contracts\Factory::class);
    }

    private function registerCommands()
    {
        $this->app->singleton('command.widget.table', function ($app) {
            return new WidgetTableCommand($app['files'], $app['composer']);
        });
    }

    public function provides()
    {
        return [
            'widget',
            \Viviniko\Widget\Contracts\Factory::class,
        ];
    }
}
