<?php

namespace Viviniko\Portal\Services\WidgetItem;

use Viviniko\Portal\Contracts\WidgetItemService;
use Viviniko\Repository\SimpleRepository;
use Viviniko\Portal\Traits\Treeable;

class EloquentWidgetItem extends SimpleRepository implements WidgetItemService
{
    use Treeable;

    protected $modelConfigKey = 'portal.widget_item';
    protected $fieldSearchable = ['widget_id'];

    public function getTreeByWidget($widget)
    {
        $query = $this->createModel()->newQuery()->select('*');
        $widgetItems = $query->where(['widget_id' => $widget->id])->orderBy('sort', 'asc')->get();
        return $this->buildTree($widgetItems);
    }
}