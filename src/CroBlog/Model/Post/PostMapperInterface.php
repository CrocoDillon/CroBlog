<?php

namespace CroBlog\Model\Post;

interface PostMapperInterface {

    /**
     * Get a (filtered) set of posts.
     *
     * @param  array $filter
     */
    public function getPosts(array $filter);
}
