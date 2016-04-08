<?php
// src/AppBundle/DataFixtures/ORM/LoadEducationStatus.php

namespace AppBundle\DataFixtures\ORM; 


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use AppBundle\Entity\EducationStatus;

class LoadEducationStatusData implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $items = array(
            '博士研究生',
            '硕士研究生',
            '大学本科',
            '大学专科',
            '普通高中',
            '职业高中',
            '技工学校',
            '初中',
            '小学'
        );
        foreach ($items as $item){
            $educationStatus = new EducationStatus();
            $educationStatus->setProfessionalTitle($item);
            $manager->persist($educationStatus);
        }        
        $manager->flush();
    }
}