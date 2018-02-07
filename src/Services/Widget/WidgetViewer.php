<?php

namespace Viviniko\Widget\Services\Widget;

use Viviniko\Widget\Contracts\WidgetService;
use Viviniko\Widget\Enums\WidgetTypes;
use Viviniko\Widget\Models\Widget;

class WidgetViewer
{
    protected $widgetService;

    protected $widget;

    protected $template;

    public function __construct(WidgetService $widgetService, Widget $widget)
    {
        $this->widgetService = $widgetService;
        $this->widget = $widget;
    }

    public function items()
    {
        $items = $this->widgetService->getWidgetData($this->widget->id);

        if ($this->widget->type == WidgetTypes::MENU) {
            return $this->widgetService->buildTreeByWidgetId($this->widget->id);
        } else if ($this->widget->type == WidgetTypes::SINGLE) {
            return $items->sortBy('sort')->first();
        } else if ($this->widget->type == WidgetTypes::LIST) {
            return $items->sortBy('sort');
        }

        return $items;
    }

    public function render($template = null)
    {
        if (!$template) {
            foreach (["widgets.{$this->widget->group->name}.{$this->widget->name}", "widgets.{$this->widget->name}"] as $view) {
                if (view()->exists($view)) {
                    $template = $view;
                    break;
                }
            }
        }

        $this->template = $template;

        return view($this->template, array_merge($this->widget->getAttributes(), [
            ($this->widget->type == 'Single' ? 'item' : 'items') => $this->items()
        ]))->render();
    }

    public function __toString()
    {
        return $this->render();
    }

    public function __get($name)
    {
        if (method_exists($this, $name)) {
            return $this->$name();
        }
        return $this->widget->$name;
    }
}