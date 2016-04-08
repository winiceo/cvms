<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EducationStatus
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class EducationStatus
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
     * @ORM\Column(name="professional_title", type="string", length=255)
     */
    private $professional_title;


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
     * Set professional_title
     *
     * @param string $professionalTitle
     * @return EducationStatus
     */
    public function setProfessionalTitle($professionalTitle)
    {
        $this->professional_title = $professionalTitle;

        return $this;
    }

    /**
     * Get professional_title
     *
     * @return string 
     */
    public function getProfessionalTitle()
    {
        return $this->professional_title;
    }
}
