<?php

namespace Viviniko\Widget\Contracts;

use Viviniko\Widget\Services\Widget\WidgetViewer;

interface WidgetService
{
    /**
     * Make widget.
     *
     * @param $name
     * @return WidgetViewer
     */
    public function make($name);

    /**
     * @param $widgetId
     * @return mixed
     */
    public function getWidgetData($widgetId);

    /**
     * @param $widgetId
     * @param null $parentId
     * @param string $parentKey
     * @return mixed
     */
    public function buildTreeByWidgetId($widgetId, $parentId = null, $parentKey = 'parent_id');
}
