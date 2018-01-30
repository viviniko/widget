<?php

namespace Viviniko\Widget\Services\Widget;

use Viviniko\Widget\Enums\WidgetTypes;
use Viviniko\Widget\Models\Widget as WidgetModel;
use Illuminate\Database\Eloquent\Collection;

class Widget {

    protected $widget;

    protected $template;

    public function __construct(WidgetModel $widget) {
        $this->widget = $widget;
    }

    public function items() {
        $items = $this->widget->items->filter(function($item) {
            return !$item->theme || $item->theme == app('website.theme');
        });

        if ($this->widget->type == WidgetTypes::MENU) {
            return $this->buildTree($items->sortBy('sort'));
        } else if ($this->widget->type == WidgetTypes::SINGLE) {
            return $items->sortBy('sort')->first();
        } else if ($this->widget->type == WidgetTypes::LIST) {
            return $items->sortBy('sort');
        }

        return $items;
    }

    public function render($template = null) {
        $this->template = $template ?: "widgets.{$this->widget->name}";

        return view($this->template, array_merge($this->widget->getAttributes(), [
            ($this->widget->type == 'Single' ? 'item' : 'items') => $this->items()
        ]))->render();
    }

    public function __toString() {
        return $this->render();
    }

    public function __get($name) {
        if (method_exists($this, $name)) {
            return $this->$name();
        }
        return $this->widget->$name;
    }

    private function buildTree(Collection $collection, $parentId = null, $parentKey = 'parent_id') {
        $groupNodes = $collection->groupBy($parentKey);
        return $collection
            ->map(function($item) use ($groupNodes) {
                $item->setRelation('children', Collection::make($groupNodes->get($item->id, [])));
                return $item;
            })->filter(function($item) use ($parentId, $parentKey) {
                return $item->{$parentKey} == $parentId;
            })->values();
    }

}