<?php

namespace Inspire\Posts\Repositories;

use Inspire\Base\Repositories\BaseReponsitory;

interface PostsRepository extends BaseReponsitory
{
    /**
     * Get all Published
     *
     * @return mixed
     */
    public function getAllIsPublished();

    /**
     * Get all has not Published;
     *
     * @return mixed
     */
    public function getAllIsNotPublished();
}
