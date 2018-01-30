<?php

namespace Viviniko\Widget\Console\Commands;

use Viviniko\Support\Console\CreateMigrationCommand;

class WidgetTableCommand extends CreateMigrationCommand
{
    /**
     * @var string
     */
    protected $name = 'widget:table';

    /**
     * @var string
     */
    protected $description = 'Create a migration for the widget service table';

    /**
     * @var string
     */
    protected $stub = __DIR__.'/stubs/widget.stub';

    /**
     * @var string
     */
    protected $migration = 'create_widget_table';
}