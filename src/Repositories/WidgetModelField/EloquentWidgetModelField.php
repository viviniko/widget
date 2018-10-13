<?php

namespace Viviniko\Widget\Repositories\WidgetModelField;

use Viviniko\Repository\EloquentRepository;

class EloquentWidgetModelField extends EloquentRepository implements WidgetModelFieldRepository
{
    public function __construct()
    {
        parent::__construct('widget.widget_model_field');
    }
}