<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WechatSubscriber
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class WechatSubscriber
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
     * @var string
     *
     * @ORM\Column(name="wechat_id", type="string", length=255)
     */
    private $wechatId;


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
     * Set wechatId
     *
     * @param string $wechatId
     * @return WechatSubscriber
     */
    public function setWechatId($wechatId)
    {
        $this->wechatId = $wechatId;

        return $this;
    }

    /**
     * Get wechatId
     *
     * @return string 
     */
    public function getWechatId()
    {
        return $this->wechatId;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->organization = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
