<?php

namespace Viviniko\Widget\Repositories\WidgetItem;

use Viviniko\Repository\EloquentRepository;

class EloquentWidgetItem extends EloquentRepository implements WidgetItemRepository
{
    public function __construct()
    {
        parent::__construct('widget.widget_item');
    }
}