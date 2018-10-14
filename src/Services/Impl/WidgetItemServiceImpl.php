<?php

namespace Viviniko\Widget\Services\Impl;

use Illuminate\Http\Request;
use Viviniko\Support\AbstractRequestRepositoryService;
use Viviniko\Widget\Repositories\WidgetItem\WidgetItemRepository;
use Viviniko\Widget\Services\WidgetItemService;

class WidgetItemServiceImpl extends AbstractRequestRepositoryService implements WidgetItemService
{
    protected $repository;

    public function __construct(WidgetItemRepository $repository, Request $request)
    {
        parent::__construct($request);
        $this->repository = $repository;
    }

    public function getRepository()
    {
        return $this->repository;
    }
}