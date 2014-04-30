<?php

namespace CroBlog\Service;

use CroBlog\Model\Post\PostInterface;
use CroBlog\Model\Post\PostMapperInterface;
use Iterator;
use IteratorAggregate;

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
     * Get a single post by id.
     *
     * @param  int $id
     * @return PostInterface
     */
    public function getPostById($id)
    {
        return $this->postMapper->getPost(array('id' => $id));
    }

    /**
     * Get a single post by slug.
     *
     * @param  string $slug
     * @return PostInterface
     */
    public function getPostBySlug($slug)
    {
        return $this->postMapper->getPost(array('slug' => $slug));
    }

    /**
     * Get a (filtered) set of posts.
     *
     * @param  array $filter
     * @return array|Iterator|IteratorAggregate
     */
    public function getPosts(array $filter = array())
    {
        $defaults = array(
            'page'           => 1,
            'posts_per_page' => 8,
            'order_by'       => 'created',
            'order'          => 'DESC',
        );
        $filter = array_merge($defaults, $filter);
        return $this->postMapper->getPosts($filter);
    }

    /**
     * Create a new post.
     *
     * @param  PostInterface $post
     * @return PostInterface
     */
    public function createPost(PostInterface $post)
    {
        return $this->postMapper->persist($post);
    }

    /**
     * Update an existing post.
     *
     * @param  PostInterface $post
     * @return PostInterface
     */
    public function updatePost(PostInterface $post)
    {
        return $this->postMapper->persist($post);
    }

    /**
     * Delete an existing post. Implementation details like delete post from
     * database or simply marked as deleted is left to the PostMapper.
     *
     * @param  int|string|PostInterface $post
     * @return PostInterface
     */
    public function deletePost($post)
    {
        if (!$post instanceof PostInterface)
        {
            if (is_int($post))
                $post = $this->getPostById($post);
            if (is_string($post))
                $post = $this->getPostBySlug($post);
        }

        return $this->postMapper->delete($post);
    }
}
