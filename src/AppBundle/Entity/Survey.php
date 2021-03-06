<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Survey
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Survey
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
     * @var \Doctrine\Common\Collections\ArrayCollection $questions
     *
     * @ORM\OneToMany(targetEntity="Question", mappedBy="survey", cascade={"all"}, orphanRemoval=true)
     */
    private $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $questions
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    public function addQuestion(Question $question)
    {
        $question->setSurvey($this);
        $this->questions->add($question);
    }

    public function removeQuestion(Question $question)
    {
        $this->questions->removeElement($question);
    }
}