<?php

namespace Viviniko\Widget\Repositories\WidgetItem;

use Viviniko\Repository\SimpleRepository;

class EloquentWidgetItem extends SimpleRepository implements WidgetItemRepository
{
    /**
     * @var string
     */
    protected $modelConfigKey = 'widget.widget_item';
}