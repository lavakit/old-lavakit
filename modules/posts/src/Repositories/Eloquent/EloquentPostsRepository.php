<?php

namespace Inspire\Posts\Repositories\Eloquent;

use Inspire\Base\Repositories\Eloquent\EloquentBaseRepositories;
use Inspire\Posts\Repositories\PostsRepository;


class EloquentPostsRepository extends EloquentBaseRepositories implements PostsRepository
{
    /**
     * Get all not published
     */
    public function getAllIsNotPublished()
    {
        // TODO: Implement getAllIsNotPublished() method.
    }

    /**
     * Get all published
     */
    public function getAllIsPublished()
    {
        // TODO: Implement getAllIsPublished() method.
    }
}
