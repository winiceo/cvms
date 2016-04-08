<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Choice
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ActivityApply
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
     * @var integer $userid
     *
     * @ORM\Column(name="userid", type="integer")
     */
    private $userid;
    

    /**
     * @var integer $status
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $sattus;
    

    /**
     * @ORM\Column(type="integer")
     */
    protected $score;

    /**
     * @var string $comment
     *
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;

    /**
     * @var Activity $activity
     *
     * @ORM\ManyToOne(targetEntity="Activity", inversedBy="applys")
     * @ORM\JoinColumn(name="activity", referencedColumnName="id", onDelete="cascade")
     */
    private $activity;

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
     * Set userid
     *
     * @param integer $userid
     * @return ActivityApply
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set sattus
     *
     * @param integer $sattus
     * @return ActivityApply
     */
    public function setSattus($sattus)
    {
        $this->sattus = $sattus;

        return $this;
    }

    /**
     * Get sattus
     *
     * @return integer 
     */
    public function getSattus()
    {
        return $this->sattus;
    }

    /**
     * Set score
     *
     * @param integer $score
     * @return ActivityApply
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
     * Set comment
     *
     * @param string $comment
     * @return ActivityApply
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set activity
     *
     * @param \AppBundle\Entity\Activity $activity
     * @return ActivityApply
     */
    public function setActivity(\AppBundle\Entity\Activity $activity = null)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return \AppBundle\Entity\Activity 
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $ret="user:" . $this->getUserid() . " status:" . $this->getSattus() . " score:" . $this->getScore() . " comment:" . $this->getComment();
        return  $ret;
    }
}
