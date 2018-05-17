<?php

namespace Inspire\Base\Repositories;

interface BaseReponsitory
{
    /**
     * Get All Model
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Get By Id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * Create by
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = []);

    /**
     * Update a object
     *
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes = []);

    /**
     * Delete a object
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
