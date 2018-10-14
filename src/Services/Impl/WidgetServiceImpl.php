<?php

namespace Viviniko\Widget\Services\Impl;

use Illuminate\Http\Request;
use Viviniko\Support\AbstractRequestRepositoryService;
use Viviniko\Widget\Repositories\Widget\WidgetRepository;
use Viviniko\Widget\Services\WidgetService;

class WidgetServiceImpl extends AbstractRequestRepositoryService implements WidgetService
{
    protected $repository;

    public function __construct(WidgetRepository $repository, Request $request)
    {
        parent::__construct($request);
        $this->repository = $repository;
    }

    public function getRepository()
    {
        return $this->repository;
    }
}