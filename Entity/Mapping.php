<?php

namespace Flexy\SystemBundle\Entity;

use Flexy\SystemBundle\Lib\BaseEntity;

/**
 * Mapping
 */
class Mapping extends BaseEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $target;

    /**
     * @var integer
     */
    private $ordering;

    /**
     * @var Section
     */
    private $section;

    /**
     * @var App
     */
    private $app;

    /**
     * @var Navigation
     */
    private $navigation;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * To string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->type . ' ' . $this->target;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Mapping
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set target
     *
     * @param string $target
     *
     * @return Mapping
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set ordering
     *
     * @param integer $ordering
     *
     * @return Mapping
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering
     *
     * @return integer
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * Set section
     *
     * @param  Section $section
     * @return Mapping
     */
    public function setSection(Section $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return Section
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set app
     *
     * @param  \Flexy\SystemBundle\Entity\App $app
     * @return Mapping
     */
    public function setApp(\Flexy\SystemBundle\Entity\App $app = null)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * Get app
     *
     * @return \Flexy\SystemBundle\Entity\App
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Set navigation
     *
     * @param  \Flexy\SystemBundle\Entity\Navigation $navigation
     * @return Mapping
     */
    public function setNavigation(\Flexy\SystemBundle\Entity\Navigation $navigation = null)
    {
        $this->navigation = $navigation;

        return $this;
    }

    /**
     * Get navigation
     *
     * @return \Flexy\SystemBundle\Entity\Navigation
     */
    public function getNavigation()
    {
        return $this->navigation;
    }

}
