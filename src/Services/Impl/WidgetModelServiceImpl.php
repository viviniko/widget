<?php

namespace Viviniko\Widget\Services\Impl;

use Illuminate\Http\Request;
use Viviniko\Support\AbstractRequestRepositoryService;
use Viviniko\Widget\Repositories\WidgetModel\WidgetModelRepository;
use Viviniko\Widget\Services\WidgetModelService;

class WidgetModelServiceImpl extends AbstractRequestRepositoryService implements WidgetModelService
{
    protected $repository;

    public function __construct(WidgetModelRepository $repository, Request $request)
    {
        parent::__construct($request);
        $this->repository = $repository;
    }

    public function getRepository()
    {
        return $this->repository;
    }
}