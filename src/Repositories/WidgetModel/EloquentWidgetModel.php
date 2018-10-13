<?php

namespace Viviniko\Widget\Repositories\WidgetModel;

use Viviniko\Repository\EloquentRepository;

class EloquentWidgetModel extends EloquentRepository implements WidgetModelRepository
{
    public function __construct()
    {
        parent::__construct('widget.widget_model');
    }
}