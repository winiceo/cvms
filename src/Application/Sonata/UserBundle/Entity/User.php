<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * This file has been generated by the Sonata EasyExtends bundle.
 *
 * @link https://sonata-project.org/bundles/easy-extends
 *
 * References :
 *   working with object : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en
 *
 * @author <yourname> <youremail>
 */
 
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /*
     * -------------------------- Extra Information ---------------------
     */    
    
    const USER_TYPE_VOLUNTEER = 1;
    const USER_TYPE_STAFF = 2;
    
    /**
     * @var string
     *
     * @ORM\Column(name="identity_num", type="string", length=255, nullable=TRUE)
     */
    private $identityNum;

    /**
     * @var string
     *
     * @ORM\Column(name="avata", type="string", length=255, nullable=TRUE)
     */
    private $avata;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_point", type="integer",options={"default" = 0}, nullable=TRUE)
     */
    private $totalPoint;

    /**
     * @var integer
     *
     * @ORM\Column(name="exchanged_point", type="integer", options={"default" = 0}, nullable=TRUE)
     */
    private $exchangedPoint;
    

    /**
     * @var integer
     *  
     * @ORM\Column(name="auto_type", type="integer", options={"default" = 1}, nullable=TRUE)
     */
    private $autoType;    
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Organization")
     * @ORM\JoinColumn(name="organization_id", referencedColumnName="id")
     **/
    private $organization;
    
    /**
     * @ORM\OneToOne(targetEntity="\AppBundle\Entity\WechatSubscriber")
     * @ORM\JoinColumn(name="wechat_id", referencedColumnName="id", nullable=TRUE)
     **/
    private $wechat;
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\EducationStatus")
     * @ORM\JoinColumn(name="education_status_id", referencedColumnName="id")
     **/
    private $education;
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\NationStatus")
     * @ORM\JoinColumn(name="nation_status_id", referencedColumnName="id")
     **/
    private $nation;
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\PoliticalStatus")
     * @ORM\JoinColumn(name="political_status_id", referencedColumnName="id")
     **/
    private $politics;        
    

    /**
     * Get id
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set identityNum
     *
     * @param string $identityNum
     * @return User
     */
    public function setIdentityNum($identityNum)
    {
        $this->identityNum = $identityNum;

        return $this;
    }

    /**
     * Get identityNum
     *
     * @return string 
     */
    public function getIdentityNum()
    {
        return $this->identityNum;
    }

    /**
     * Set avata
     *
     * @param string $avata
     * @return User
     */
    public function setAvata($avata)
    {
        $this->avata = $avata;

        return $this;
    }

    /**
     * Get avata
     *
     * @return string 
     */
    public function getAvata()
    {
        return $this->avata;
    }

    /**
     * Set totalPoint
     *
     * @param integer $totalPoint
     * @return User
     */
    public function setTotalPoint($totalPoint)
    {
        $this->totalPoint = $totalPoint;

        return $this;
    }

    /**
     * Get totalPoint
     *
     * @return integer 
     */
    public function getTotalPoint()
    {
        return $this->totalPoint;
    }

    /**
     * Set exchangedPoint
     *
     * @param integer $exchangedPoint
     * @return User
     */
    public function setExchangedPoint($exchangedPoint)
    {
        $this->exchangedPoint = $exchangedPoint;

        return $this;
    }

    /**
     * Get exchangedPoint
     *
     * @return integer 
     */
    public function getExchangedPoint()
    {
        return $this->exchangedPoint;
    }

    /**
     * Set organization
     *
     * @param \AppBundle\Entity\Organization $organization
     * @return User
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

    /**
     * Set wechat
     *
     * @param \AppBundle\Entity\WechatSubscriber $wechat
     * @return User
     */
    public function setWechat(\AppBundle\Entity\WechatSubscriber $wechat = null)
    {
        $this->wechat = $wechat;

        return $this;
    }

    /**
     * Get wechat
     *
     * @return \AppBundle\Entity\WechatSubscriber 
     */
    public function getWechat()
    {
        return $this->wechat;
    }

    /**
     * Set education
     *
     * @param \AppBundle\Entity\EducationStatus $education
     * @return User
     */
    public function setEducation(\AppBundle\Entity\EducationStatus $education = null)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return \AppBundle\Entity\EducationStatus 
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set nation
     *
     * @param \AppBundle\Entity\NationStatus $nation
     * @return User
     */
    public function setNation(\AppBundle\Entity\NationStatus $nation = null)
    {
        $this->nation = $nation;

        return $this;
    }

    /**
     * Get nation
     *
     * @return \AppBundle\Entity\NationStatus 
     */
    public function getNation()
    {
        return $this->nation;
    }

    /**
     * Set autoType
     *
     * @param integer $autoType
     * @return User
     */
    public function setAutoType($autoType)
    {
        $this->autoType = $autoType;

        return $this;
    }

    /**
     * Get autoType
     *
     * @return integer 
     */
    public function getAutoType()
    {
        return $this->autoType;
    }

    /**
     * Set politics
     *
     * @param \AppBundle\Entity\PoliticalStatus $politics
     * @return User
     */
    public function setPolitics(\AppBundle\Entity\PoliticalStatus $politics = null)
    {
        $this->politics = $politics;

        return $this;
    }

    /**
     * Get politics
     *
     * @return \AppBundle\Entity\PoliticalStatus 
     */
    public function getPolitics()
    {
        return $this->politics;
    }
}