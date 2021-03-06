<?php

namespace Flexy\SystemBundle\Entity;

/**
 * TokenTranslation
 */
class TokenTranslation
{
    public function __toString()
    {
        if (false == $this->id) {
            return 'New Token Translation';
        }

        if ($name = $this->getName()) {
            return $name;
        }

        // No name found
        return '';
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \Flexy\SystemBundle\Entity\Token
     */
    private $token;


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
     * Set locale
     *
     * @param string $locale
     * @return TokenTranslation
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    
        return $this;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return TokenTranslation
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set domain
     *
     * @param string $domain
     * @return TokenTranslation
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    
        return $this;
    }

    /**
     * Get domain
     *
     * @return string 
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return TokenTranslation
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set token
     *
     * @param \Flexy\SystemBundle\Entity\Token $token
     * @return TokenTranslation
     */
    public function setToken(\Flexy\SystemBundle\Entity\Token $token = null)
    {
        $this->token = $token;
    
        return $this;
    }

    /**
     * Get token
     *
     * @return \Flexy\SystemBundle\Entity\Token
     */
    public function getToken()
    {
        return $this->token;
    }
}