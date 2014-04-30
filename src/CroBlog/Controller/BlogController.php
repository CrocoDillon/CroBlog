<?php

namespace CroBlog\Controller;

use CroBlog\Service\BlogService;
use Zend\Mvc\Controller\AbstractActionController;

class BlogController extends AbstractActionController
{
    /**
     * @var BlogService
     */
    protected $blogService;

    /**
     * Set the blog service.
     *
     * @param  BlogService $blogService
     * @return BlogController
     */
    public function setBlogService($blogService)
    {
        $this->blogService = $blogService;
        return $this;
    }

    /**
     * Get the blog service.
     *
     * @return BlogService
     */
    public function getBlogService()
    {
        return $this->blogService;
    }

    /**
     * List blog posts by page.
     */
    public function indexAction()
    {
        return array(
            'posts' => $this->blogService->getPosts(),
        );
    }

    /**
     * Shows a specific blog post.
     */
    public function postAction()
    {
        $slug = $this->params()->fromRoute('slug');
        $post = $this->blogService->getPostBySlug($slug);

        if (!$post)
        {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        return array(
            'post' => $post,
        );
    }
}
