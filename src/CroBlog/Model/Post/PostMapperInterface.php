<?php

namespace CroBlog\Model\Post;

use Iterator;
use IteratorAggregate;

interface PostMapperInterface
{
    /**
     * Get a single post.
     *
     * @param  array $filter
     * @return PostInterface
     */
    public function getPost(array $filter);

    /**
     * Get a (filtered) set of posts.
     *
     * @param  array $filter
     * @return array|Iterator|IteratorAggregate of PostInterface's
     */
    public function getPosts(array $filter);

    /**
     * Persist post data.
     *
     * @param  PostInterface $post
     * @return PostInterface
     */
    public function persist(PostInterface $post);

    /**
     * Delete a post.
     *
     * @param  PostInterface $post
     * @return PostInterface
     */
    public function delete(PostInterface $post);
}
