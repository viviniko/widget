<?php

namespace Viviniko\Widget\Repositories\Widget;

interface WidgetRepository
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