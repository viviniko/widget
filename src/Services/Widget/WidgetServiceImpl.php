<?php
namespace Viviniko\Widget\Services\Widget;

use Viviniko\Widget\Contracts\WidgetService;
use Viviniko\Widget\Repositories\Widget\WidgetRepository;

class WidgetServiceImpl implements WidgetService
{
    /**
     * @var \Viviniko\Widget\Repositories\Widget\WidgetRepository
     */
    protected $widgetRepository;

    public function __construct(WidgetRepository $widgetRepository)
    {
        $this->widgetRepository = $widgetRepository;
    }

    public function make($name)
    {
        $widget = $this->widgetRepository->findByName($name);

        return $widget ? new Widget($widget) : null;
    }
}