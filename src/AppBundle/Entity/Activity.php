<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Choice
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Activity
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $startAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $endAt;

    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var boolean $expanded
     *
     * @ORM\Column(name="public", type="boolean")
     */
    private $public;

    /**
     * @var string $name
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="integer")
     */
    protected $limited;

    /**
     * @ORM\Column(type="integer")
     */
    protected $score;

    /**
     * @ORM\Column(type="integer")
     */
    protected $applynum;

    /**
     * @ORM\Column(type="integer")
     */
    protected $attendnum;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $applys
     *
     * @ORM\OneToMany(targetEntity="ActivityApply", mappedBy="activity", cascade={"all"}, orphanRemoval=true)
     */
    private $applys;

    public function __construct()
    {
        $this->setApplynum(0);
        $this->setAttendnum(0);
        $this->applys = new ArrayCollection();
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
     * @return Activity
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Activity
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set startAt
     *
     * @param \DateTime $startAt
     * @return Activity
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * Get startAt
     *
     * @return \DateTime 
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * Set endAt
     *
     * @param \DateTime $endAt
     * @return Activity
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;

        return $this;
    }

    /**
     * Get endAt
     *
     * @return \DateTime 
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Activity
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
     * Set public
     *
     * @param boolean $public
     * @return Activity
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get public
     *
     * @return boolean 
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Activity
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set limited
     *
     * @param integer $limited
     * @return Activity
     */
    public function setLimited($limited)
    {
        $this->limited = $limited;

        return $this;
    }

    /**
     * Get limited
     *
     * @return integer 
     */
    public function getLimited()
    {
        return $this->limited;
    }

    /**
     * Set score
     *
     * @param integer $score
     * @return Activity
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set applynum
     *
     * @param integer $applynum
     * @return Activity
     */
    public function setApplynum($applynum)
    {
        $this->applynum = $applynum;

        return $this;
    }

    /**
     * Get applynum
     *
     * @return integer 
     */
    public function getApplynum()
    {
        return $this->applynum;
    }

    /**
     * Set attendnum
     *
     * @param integer $attendnum
     * @return Activity
     */
    public function setAttendnum($attendnum)
    {
        $this->attendnum = $attendnum;

        return $this;
    }

    /**
     * Get attendnum
     *
     * @return integer 
     */
    public function getAttendnum()
    {
        return $this->attendnum;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $applys
     */
    public function setApplys($applys)
    {
        $this->applys = $applys;
    }

    /**
     * Get applys
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApplys()
    {
        return $this->applys;
    }

    /**
     * Add applys
     *
     * @param \AppBundle\Entity\ActivityApply $applys
     * @return Activity
     */
    public function addApply(\AppBundle\Entity\ActivityApply $applys)
    {
        $applys->setActivity($this);
        $this->applys->add($applys);

        return $this;
    }

    /**
     * Remove applys
     *
     * @param \AppBundle\Entity\ActivityApply $applys
     */
    public function removeApply(\AppBundle\Entity\ActivityApply $applys)
    {
        $this->applys->removeElement($applys);
    }
}
