<?php

namespace Viviniko\Widget\Repositories\WidgetModelField;

use Viviniko\Repository\SimpleRepository;

class EloquentWidgetModelField extends SimpleRepository implements WidgetModelFieldRepository
{
    /**
     * @var string
     */
    protected $modelConfigKey = 'widget.widget_model_field';
}