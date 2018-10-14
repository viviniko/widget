<?php

namespace Viviniko\Widget\Services\Impl;

use Illuminate\Http\Request;
use Viviniko\Support\AbstractRequestRepositoryService;
use Viviniko\Widget\Repositories\WidgetModelField\WidgetModelFieldRepository;
use Viviniko\Widget\Services\WidgetModelFieldService;

class WidgetModelFieldServiceImpl extends AbstractRequestRepositoryService implements WidgetModelFieldService
{
    protected $repository;

    public function __construct(WidgetModelFieldRepository $repository, Request $request)
    {
        parent::__construct($request);
        $this->repository = $repository;
    }

    public function getRepository()
    {
        return $this->repository;
    }
}