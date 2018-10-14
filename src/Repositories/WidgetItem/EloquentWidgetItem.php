<?php

namespace Viviniko\Widget\Repositories\WidgetItem;

use Illuminate\Support\Facades\Config;
use Viviniko\Repository\EloquentRepository;

class EloquentWidgetItem extends EloquentRepository implements WidgetItemRepository
{
    public function __construct()
    {
        parent::__construct(Config::get('widget.widget_item'));
    }
}