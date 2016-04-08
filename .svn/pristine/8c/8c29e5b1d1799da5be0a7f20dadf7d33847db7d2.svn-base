<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * VolunteerLevelParams
 *
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="vlparam_idx", columns={"level", "adult", "organization_id"})})
 * @ORM\Entity
 */
class VolunteerLevelParams
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
     * @var integer
     * 
     * @ORM\Column(name="level", type="integer")
     * @Assert\Range(
     *      min = 0,
     *      max = 99,
     *      minMessage = "You must be at least {{ limit }}cm tall to enter",
     *      maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )     
     */    
    private $level;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="point_min", type="integer")
     * @Assert\Range(
     *      min = 0,
     *      max = 999999,
     *      minMessage = "You must be at least {{ limit }}cm tall to enter",
     *      maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )     
     */    

    private $point_min;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="point_max", type="integer")
     * @Assert\Range(
     *      min = 0,
     *      max = 999999,
     *      minMessage = "You must be at least {{ limit }}cm tall to enter",
     *      maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )     
     */    
    private $point_max;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="adult", type="boolean")
     */
    private $adult;
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Organization")
     * @ORM\JoinColumn(name="organization_id", referencedColumnName="id")
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
     * Set level
     *
     * @param integer $level
     * @return VolunteerLevelParams
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set point_min
     *
     * @param integer $pointMin
     * @return VolunteerLevelParams
     */
    public function setPointMin($pointMin)
    {
        $this->point_min = $pointMin;

        return $this;
    }

    /**
     * Get point_min
     *
     * @return integer 
     */
    public function getPointMin()
    {
        return $this->point_min;
    }

    /**
     * Set point_max
     *
     * @param integer $pointMax
     * @return VolunteerLevelParams
     */
    public function setPointMax($pointMax)
    {
        $this->point_max = $pointMax;

        return $this;
    }

    /**
     * Get point_max
     *
     * @return integer 
     */
    public function getPointMax()
    {
        return $this->point_max;
    }

    /**
     * Set adult
     *
     * @param boolean $adult
     * @return VolunteerLevelParams
     */
    public function setAdult($adult)
    {
        $this->adult = $adult;

        return $this;
    }

    /**
     * Get adult
     *
     * @return boolean 
     */
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * Set organization
     *
     * @param \AppBundle\Entity\Organization $organization
     * @return VolunteerLevelParams
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
