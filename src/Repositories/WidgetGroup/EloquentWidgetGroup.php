<?php

namespace Viviniko\Widget\Repositories\WidgetGroup;

use Viviniko\Repository\EloquentRepository;

class EloquentWidgetGroup extends EloquentRepository implements WidgetGroupRepository
{
    public function __construct()
    {
        parent::__construct('widget.widget_group');
    }

    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = null)
    {
        return $this->pluck($column, $key);
    }
}