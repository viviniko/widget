<?php

namespace Viviniko\Widget\Contracts;

use Viviniko\Widget\Services\Widget\Widget;

interface WidgetService
{
    /**
     * Make widget.
     *
     * @param $name
     * @return Widget
     */
    public function make($name);
}
