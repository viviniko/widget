<?php

namespace Viviniko\Widget\Repositories\WidgetModel;

use Illuminate\Support\Facades\Config;
use Viviniko\Repository\EloquentRepository;

class EloquentWidgetModel extends EloquentRepository implements WidgetModelRepository
{
    public function __construct()
    {
        parent::__construct(Config::get('widget.widget_model'));
    }
}