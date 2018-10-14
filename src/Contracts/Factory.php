<?php

namespace Viviniko\Widget\Contracts;

interface Factory
{
    /**
     * Make widget.
     *
     * @param $name
     * @return Viewer
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