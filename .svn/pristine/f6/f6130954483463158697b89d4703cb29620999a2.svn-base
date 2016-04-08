<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * VolunteerPointParams
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class VolunteerPointParams
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="clear", type="boolean")
     */
    private $clear;
    

    /**
     * @var boolean
     *
     * @ORM\Column(name="notify", type="boolean")
     */
    private $notify;
    
    /**
     * @var \DateTime
     * @ORM\Column(name="clear_date", type="datetime")
     */
    private $clearDate;        
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Organization")
     * @ORM\JoinColumn(name="organization_id", referencedColumnName="id", unique=true)
     **/
    private $organization;    

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
     * Set notify_volunteer
     *
     * @param boolean $notifyVolunteer
     * @return VolunteerPointParams
     */
    public function setNotifyVolunteer($notifyVolunteer)
    {
        $this->notify_volunteer = $notifyVolunteer;

        return $this;
    }

    /**
     * Get notify_volunteer
     *
     * @return boolean 
     */
    public function getNotifyVolunteer()
    {
        return $this->notify_volunteer;
    }

    /**
     * Set clear_point
     *
     * @param boolean $clearPoint
     * @return VolunteerPointParams
     */
    public function setClearPoint($clearPoint)
    {
        $this->clear_point = $clearPoint;

        return $this;
    }

    /**
     * Get clear_point
     *
     * @return boolean 
     */
    public function getClearPoint()
    {
        return $this->clear_point;
    }

    /**
     * Set clear
     *
     * @param boolean $clear
     * @return VolunteerPointParams
     */
    public function setClear($clear)
    {
        $this->clear = $clear;

        return $this;
    }

    /**
     * Get clear
     *
     * @return boolean 
     */
    public function getClear()
    {
        return $this->clear;
    }

    /**
     * Set notify
     *
     * @param boolean $notify
     * @return VolunteerPointParams
     */
    public function setNotify($notify)
    {
        $this->notify = $notify;

        return $this;
    }

    /**
     * Get notify
     *
     * @return boolean 
     */
    public function getNotify()
    {
        return $this->notify;
    }

    /**
     * Set clearDate
     *
     * @param \DateTime $clearDate
     * @return VolunteerPointParams
     */
    public function setClearDate($clearDate)
    {
        $this->clearDate = $clearDate;

        return $this;
    }

    /**
     * Get clearDate
     *
     * @return \DateTime 
     */
    public function getClearDate()
    {
        return $this->clearDate;
    }

    /**
     * Set organization
     *
     * @param \AppBundle\Entity\Organization $organization
     * @return VolunteerPointParams
     */
    public function setOrganization(\AppBundle\Entity\Organization $organization = null)
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * Get organization
     *
     * @return \AppBundle\Entity\Organization 
     */
    public function getOrganization()
    {
        return $this->organization;
    }
}
