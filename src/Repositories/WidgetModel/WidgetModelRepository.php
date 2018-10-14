<?php

namespace Viviniko\Widget\Repositories\WidgetModel;

use Viviniko\Repository\SearchRequest;

interface WidgetModelRepository
{
    /**
     * Search.
     *
     * @param SearchRequest $searchRequest
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
     */
    public function search(SearchRequest $searchRequest);

    /**
     * @param string $column
     * @param null $key
     * @return mixed
     */
    public function pluck($column, $key = null);

    /**
     * Find widget model by its id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create new widget model.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update widget model specified by it's id.
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Delete widget model with provided id.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}