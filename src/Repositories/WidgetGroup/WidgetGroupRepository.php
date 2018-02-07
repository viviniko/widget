<?php

namespace Viviniko\Widget\Repositories\WidgetGroup;

interface WidgetGroupRepository
{
    /**
     * Get all groups.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

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