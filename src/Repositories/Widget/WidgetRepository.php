<?php

namespace Viviniko\Widget\Repositories\Widget;

use Viviniko\Repository\SearchRequest;

interface WidgetRepository
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
     * Find widget by its id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Find widget by given name.
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new widget.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update widget specified by it's id.
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Delete widget with provided id.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}