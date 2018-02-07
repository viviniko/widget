<?php

namespace Viviniko\Widget\Repositories\WidgetGroup;

use Viviniko\Repository\SimpleRepository;

class EloquentWidgetGroup extends SimpleRepository implements WidgetGroupRepository
{
    /**
     * @var string
     */
    protected $modelConfigKey = 'widget.widget_group';

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->createModel()->get();
    }
}