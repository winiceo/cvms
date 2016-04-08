<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NationStatus
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class NationStatus
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
     * @ORM\Column(name="party", type="string", length=255)
     */
    private $nation;


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
     * Set nation
     *
     * @param string $nation
     * @return NationStatus
     */
    public function setNation($nation)
    {
        $this->nation = $nation;

        return $this;
    }

    /**
     * Get nation
     *
     * @return string 
     */
    public function getNation()
    {
        return $this->nation;
    }
}
