<?php

namespace Viviniko\Widget\Services\Impl;

use Illuminate\Http\Request;
use Viviniko\Support\AbstractRequestRepositoryService;
use Viviniko\Widget\Repositories\WidgetGroup\WidgetGroupRepository;
use Viviniko\Widget\Services\WidgetGroupService;

class WidgetGroupServiceImpl extends AbstractRequestRepositoryService implements WidgetGroupService
{
    protected $repository;

    public function __construct(WidgetGroupRepository $repository, Request $request)
    {
        parent::__construct($request);
        $this->repository = $repository;
    }

    public function getRepository()
    {
        return $this->repository;
    }
}