<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Answer
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Answer
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
     * @var Survey $survey
     *
     * @ORM\ManyToOne(targetEntity="Survey")
     * @ORM\JoinColumn(name="survey", referencedColumnName="id", onDelete="cascade")
     */
    private $survey;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $choices
     *
     * @ORM\ManyToMany(targetEntity="Choice")
     * @ORM\JoinTable(name="answer_choice",
     *      joinColumns={@ORM\JoinColumn(name="answer", referencedColumnName="id", onDelete="cascade")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="choice", referencedColumnName="id", onDelete="cascade")})
     */
    private $choices;

    public function __construct(Survey $survey)
    {
        $this->survey = $survey;

        $this->choices = new ArrayCollection();
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
     * @param \AppBundle\Entity\Survey $survey
     */
    public function setSurvey($survey)
    {
        $this->survey = $survey;
    }

    /**
     * @return \AppBundle\Entity\Survey
     */
    public function getSurvey()
    {
        return $this->survey;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $choices
     */
    public function setChoices($choices)
    {
        $this->choices = $choices;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getChoices()
    {
        return $this->choices;
    }

    public function addChoice(Choice $choice)
    {
        $this->choices->add($choice);
    }
}