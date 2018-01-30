<?php

namespace Viviniko\Widget\Repositories\WidgetModel;

interface WidgetModelRepository
{
    /**
     * Paginate the given query into a simple paginator.
     *
     * @param null $perPage
     * @param string $searchName
     * @param null $search
     * @param null $order
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, $searchName = 'search', $search = null, $order = null);

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