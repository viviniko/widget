<?php

namespace Viviniko\Widget\Repositories\WidgetItem;

interface WidgetItemRepository
{
    /**
     * Find item by its id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create new item.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update item specified by it's id.
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Delete item with provided id.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}