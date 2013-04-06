<?php

namespace Egzakt\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mapping
 */
class Mapping
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
     * @var \Egzakt\SystemBundle\Entity\Section
     */
    private $section;

    /**
     * @var \Egzakt\SystemBundle\Entity\App
     */
    private $app;

    /**
     * @var \Egzakt\SystemBundle\Entity\Navigation
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
     * Set type
     *
     * @param string $type
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
     * @param \Egzakt\SystemBundle\Entity\Section $section
     * @return Mapping
     */
    public function setSection(\Egzakt\SystemBundle\Entity\Section $section = null)
    {
        $this->section = $section;
    
        return $this;
    }

    /**
     * Get section
     *
     * @return \Egzakt\SystemBundle\Entity\Section 
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set app
     *
     * @param \Egzakt\SystemBundle\Entity\App $app
     * @return Mapping
     */
    public function setApp(\Egzakt\SystemBundle\Entity\App $app = null)
    {
        $this->app = $app;
    
        return $this;
    }

    /**
     * Get app
     *
     * @return \Egzakt\SystemBundle\Entity\App 
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Set navigation
     *
     * @param \Egzakt\SystemBundle\Entity\Navigation $navigation
     * @return Mapping
     */
    public function setNavigation(\Egzakt\SystemBundle\Entity\Navigation $navigation = null)
    {
        $this->navigation = $navigation;
    
        return $this;
    }

    /**
     * Get navigation
     *
     * @return \Egzakt\SystemBundle\Entity\Navigation 
     */
    public function getNavigation()
    {
        return $this->navigation;
    }
}