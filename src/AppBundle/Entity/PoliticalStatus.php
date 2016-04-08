<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PoliticalStatus
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PoliticalStatus
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
    private $party;


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
     * Set party
     *
     * @param string $party
     * @return PoliticalStatus
     */
    public function setParty($party)
    {
        $this->party = $party;

        return $this;
    }

    /**
     * Get party
     *
     * @return string 
     */
    public function getParty()
    {
        return $this->party;
    }
}
