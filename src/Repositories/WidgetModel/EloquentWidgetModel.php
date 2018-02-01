<?php

namespace Viviniko\Widget\Repositories\WidgetModel;

use Viviniko\Repository\SimpleRepository;

class EloquentWidgetModel extends SimpleRepository implements WidgetModelRepository
{
    /**
     * @var string
     */
    protected $modelConfigKey = 'widget.widget_model';

    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = null)
    {
        return $this->pluck($column, $key);
    }
}