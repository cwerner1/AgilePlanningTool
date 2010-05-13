<?php
use Doctrine\Common\Collections;

/**
 * @Entity
 * @Table(name="project")
 */
class Apt_Model_Project implements Zend_Acl_Resource_Interface
{
    /**
     * @var Apt_Model_User
     */
    protected $_currentUser = null;

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @Column(type="string", length=50) */
    protected $name;

    /** @Column(type="integer") */
    protected $defaultVelocity;

    /** @Column(type="integer") */
    protected $sprintLength = 2;

    /** @ManyToOne(targetEntity="Apt_Model_User", cascade={"persist"})) */
    protected $productOwner;

    /** @OneToMany(targetEntity="Apt_Model_Story", mappedBy="project", cascade={"persist", "remove"}) */
    protected $stories;

    /** @Column(type="datetime") */
    protected $createdOn;

    /** @ManyToOne(targetEntity="Apt_Model_User", cascade={"persist"})) */
    protected $createdBy;

    /** @Column(type="datetime", nullable=true) */
    protected $changedOn;

    /** @ManyToOne(targetEntity="Apt_Model_User", cascade={"persist"})) */
    protected $changedBy;

    /**
     * Contructor
     */
    public function __construct()
    {
        $this->stories = new Collections\ArrayCollection();
    }

    /**
     * Sets the product owner
     *
     * @param Apt_Model_User $productOwner
     * @return Apt_Model_Project
     */
    public function setProductOwner(Apt_Model_User $_productOwner)
    {
        $this->productOwner = $_productOwner;
        return $this;
    }

    /**
     * Gets the pruduct owner
     *
     * return Apt_Model_Project
     */
    public function getProductOwner()
    {
        return $this->productOwner;
    }

    /**
     * Gets stories
     */
    public function getStories()
    {
        return $this->stories;
    }

    /**
     * Adds a story
     *
     * @param Apt_Model_Story $_story
     * @return Apt_Model_Project
     */
    public function addStory(Apt_Model_Story $_story)
    {
        $this->stories->add($_story);
        return $this;
    }

    /**
     * Returns the string identifier of the Resource
     *
     * @return string
     */
    public function getResourceId()
    {
        return 'project::' . $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($_name)
    {
        $this->name = $_name;
        return $this;
    }

    public function getSprintLength()
    {
        return $this->sprintLength;
    }

    public function setSprintLength($_length)
    {
        $this->sprintLength = (int)$_length;
        return $this;
    }

    /**
     * @return the $createdOn
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @return the $createdBy
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @return the $changedOn
     */
    public function getChangedOn()
    {
        return $this->changedOn;
    }

    /**
     * @return the $changedBy
     */
    public function getChangedBy()
    {
        return $this->changedBy;
    }

    /**
     * Sets the current user
     *
     * @param Apt_Model_User $_user
     * @return Apt_Model_Story
     */
    public function setCurrentUser(Apt_Model_User $_user)
    {
        $this->_currentUser = $_user;
        return $this;
    }
}
