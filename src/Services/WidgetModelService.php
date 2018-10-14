<?php

namespace Viviniko\Widget\Services;

interface WidgetModelService
{
    /**
     * Paginate users.
     *
     * @param $pageSize
     * @param array $wheres
     * @param array $orders
     * @return mixed
     */
    public function paginate($pageSize, $wheres = [], $orders = []);
}