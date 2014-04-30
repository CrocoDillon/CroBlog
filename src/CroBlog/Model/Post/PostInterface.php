<?php

namespace CroBlog\Model\Post;

use DateTime;

interface PostInterface
{
    /**
     * Get unique id.
     *
     * @return int
     */
    public function getId();

    /**
     * Set unique id.
     *
     * @param  int $id
     */
    public function setId($id);

    /**
     * Get created date and time.
     *
     * @return DateTime
     */
    public function getCreated();

    /**
     * Set created date and time.
     *
     * @param  DateTime|string $created
     */
    public function setCreated($created);

    /**
     * Get last updated date and time.
     *
     * @return DateTime
     */
    public function getUpdated();

    /**
     * Set last updated date and time.
     *
     * @param  DateTime|string $updated
     */
    public function setUpdated($updated);

    /**
     * Get unique slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Set unique slug.
     *
     * @param  string $slug
     */
    public function setSlug($slug);

    /**
     * Get post title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set post title.
     *
     * @param  string $title
     */
    public function setTitle($title);

    /**
     * Get post description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set post description.
     *
     * @param  string $description
     */
    public function setDescription($description);

    /**
     * Get post content.
     *
     * @return string
     */
    public function getContent();

    /**
     * Set post content.
     *
     * @param  string $content
     */
    public function setContent($content);
}
