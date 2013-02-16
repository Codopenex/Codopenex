<?php
// src/Codopenex/UserBundle/Entity/User.php

namespace Codopenex\UserBundle\Entity;

use Codopenex\RssAggregatorBundle\Entity\Feed;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	 /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\MinLength(limit="3", message="The name is too short.", groups={"Registration", "Profile"})
     * @Assert\MaxLength(limit="255", message="The name is too long.", groups={"Registration", "Profile"})
     */
    protected $name;
	
    /**
     * @ORM\ManyToMany(targetEntity="Codopenex\RssAggregatorBundle\Entity\Feed", inversedBy="User")
     * @ORM\JoinTable(name="users_feeds")
     **/
    private $feeds;

    public function __construct()
    {
        parent::__construct();
        // your own logic
		$this->feeds = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     * @return User
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
     * Add feeds
     *
     * @param \Codopenex\UserBundle\Entity\Feed $feeds
     * @return User
     */
    public function addFeed(\Codopenex\UserBundle\Entity\Feed $feeds)
    {
        $this->feeds[] = $feeds;
    
        return $this;
    }

    /**
     * Remove feeds
     *
     * @param \Codopenex\UserBundle\Entity\Feed $feeds
     */
    public function removeFeed(\Codopenex\UserBundle\Entity\Feed $feeds)
    {
        $this->feeds->removeElement($feeds);
    }

    /**
     * Get feeds
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFeeds()
    {
        return $this->feeds;
    }
}