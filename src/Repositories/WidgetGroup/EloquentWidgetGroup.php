<?php

namespace Viviniko\Widget\Repositories\WidgetGroup;

use Illuminate\Support\Facades\Config;
use Viviniko\Repository\EloquentRepository;

class EloquentWidgetGroup extends EloquentRepository implements WidgetGroupRepository
{
    public function __construct()
    {
        parent::__construct(Config::get('widget.widget_group'));
    }
}