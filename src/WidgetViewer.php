<?php

namespace Viviniko\Widget;

use Illuminate\Support\Facades\Log;
use Viviniko\Widget\Contracts\Factory;
use Viviniko\Widget\Enums\WidgetTypes;
use Viviniko\Widget\Models\Widget;

class WidgetViewer
{
    protected $factory;

    protected $widget;

    protected $template;

    public function __construct(Factory $factory, Widget $widget)
    {
        $this->factory = $factory;
        $this->widget = $widget;
    }

    public function items()
    {
        $items = $this->factory->getWidgetData($this->widget->id);

        try {
            if ($this->widget->type == WidgetTypes::MENU) {
                return $this->factory->buildTreeByWidgetId($this->widget->id);
            } else if ($this->widget->type == WidgetTypes::SINGLE) {
                return $items->sortBy('sort')->first();
            } else if ($this->widget->type == WidgetTypes::LIST) {
                return $items->sortBy('sort');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage() . var_export($items));
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