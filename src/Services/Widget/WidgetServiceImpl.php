<?php
namespace Viviniko\Widget\Services\Widget;

use Illuminate\Support\Collection;
use Viviniko\Catalog\Contracts\ProductService;
use Viviniko\Widget\Contracts\WidgetService;
use Viviniko\Widget\Enums\WidgetTypes;
use Viviniko\Widget\Repositories\Widget\WidgetRepository;

class WidgetServiceImpl implements WidgetService
{
    /**
     * @var \Viviniko\Widget\Repositories\Widget\WidgetRepository
     */
    protected $widgetRepository;

    /**
     * @var \Viviniko\Catalog\Contracts\ProductService
     */
    protected $productService;

    public function __construct(WidgetRepository $widgetRepository)
    {
        $this->widgetRepository = $widgetRepository;
    }

    public function make($name)
    {
        $widget = $this->widgetRepository->findByName($name);

        return $widget ? new WidgetViewer($this, $widget) : null;
    }

    public function getWidgetData($widgetId)
    {
        if ($widget = $this->widgetRepository->find($widgetId)) {
            return $widget->items->map(function ($item) { return $item->getData(); });
        }

        return false;
    }

    public function buildTreeByWidgetId($widgetId, $parentId = null, $parentKey = 'parent_id') {
        $widget = $this->widgetRepository->find($widgetId);

        $collection = $widget->items->map(function ($widgetItem) use ($widget) {
            $data = $widgetItem->getData();
            if (!property_exists($data, 'parent_id')) {
                $data->parent_id = 0;
            }
            if (!property_exists($data, 'text')) {
                $data->text = data_get($data, 'title') ?? data_get($data, 'name');
            }
            if (!property_exists($data, 'url')) {
                $data->url = data_get($data, 'link') ?? data_get($data, 'href');
            }
            if ($widget->type === WidgetTypes::MENU) {
                if ($data->text && !$data->url) {
                    $data->text .= "({$data->url})";
                }
            }
            if (!property_exists($data, 'icon')) {
                if ($icon = data_get($data, 'icon') ?? data_get($data, 'image') ?? data_get($data, 'picture')) {
                    $data->icon = $icon;
                }
            }

            return $data;
        })->sortBy('sort');

        $groupNodes = $collection->groupBy($parentKey);

        return $collection
            ->map(function($item) use ($groupNodes) {
                $item->children = Collection::make($groupNodes->get($item->id, []));
                return $item;
            })->filter(function($item) use ($parentId, $parentKey) {
                return $item->{$parentKey} == $parentId;
            })->values();
    }

    public function getProductService()
    {
        if (!$this->productService) {
            $this->productService = app(ProductService::class);
        }

        return $this->productService;
    }

    public function setProductService(ProductService $productService)
    {
        $this->productService = $productService;
        return $this;
    }
}