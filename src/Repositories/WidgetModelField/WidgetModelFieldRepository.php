<?php

namespace Viviniko\Widget\Repositories\WidgetModelField;

interface WidgetModelFieldRepository
{
    /**
     * Find widget model field by its id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create new widget model field.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update widget model field specified by it's id.
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Delete widget model field with provided id.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}