<?php

namespace Viviniko\Widget\Repositories\WidgetModelField;

use Illuminate\Support\Facades\Config;
use Viviniko\Repository\EloquentRepository;

class EloquentWidgetModelField extends EloquentRepository implements WidgetModelFieldRepository
{
    public function __construct()
    {
        parent::__construct(Config::get('widget.widget_model_field'));
    }
}