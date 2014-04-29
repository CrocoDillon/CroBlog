<?php

namespace CroBlog\Service;

use CroBlog\Model\Post\PostInterface;
use CroBlog\Model\Post\PostMapperInterface;

/**
 * The BlogService class acts as a facade for the CroBlog module.
 *
 * Recommended use is using the service manager to get 'CroBlog\BlogService',
 * and inject the dependant controller with it. This will get the BlogService
 * fully configured and ready to use.
 */
class BlogService
{
    /**
     * @var PostMapperInterface
     */
    protected $postMapper;

    /**
     * Get PostMapper.
     *
     * @return PostMapperInterface
     */
    public function getPostMapper()
    {
        return $this->postMapper;
    }

    /**
     * Set PostMapper.
     *
     * @param  PostMapperInterface $postMapper
     * @return BlogService
     */
    public function setPostMapper(PostMapperInterface $postMapper)
    {
        $this->postMapper = $postMapper;
        return $this;
    }

    /**
     * Get a (filtered) set of posts.
     *
     * @param  array $filter
     */
    public function getPosts(array $filter = array())
    {
        return $this->postMapper->getPosts($filter);
    }
}
