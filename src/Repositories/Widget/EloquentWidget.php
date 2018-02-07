<?php

namespace Viviniko\Widget\Repositories\Widget;

use Viviniko\Repository\SimpleRepository;

class EloquentWidget extends SimpleRepository implements WidgetRepository
{
    /**
     * @var string
     */
    protected $modelConfigKey = 'widget.widget';

    /**
     * @var array
     */
    protected $fieldSearchable = ['id', 'model_id', 'group_id', 'name' => 'like', 'display_name' => 'like', 'type'];

    /**
     * Find widget by given name.
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name)
    {
        return $this->createModel()->where('name', $name)->first();
    }
}