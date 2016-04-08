<?php
// src/AppBundle/DataFixtures/ORM/LoadOrganization.php

namespace AppBundle\DataFixtures\ORM; 


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use AppBundle\Entity\CounitType;

class LoadCounitType implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $items = array(
            '学校',
            '区县',
            '委办局',
            '企事业单位',
            '社会团体',
            '驻京单位',
            '其它  '
        );
        
        foreach ($items as $item){
            $type = new CounitType();
            $type->setName($item);
            $manager->persist($type);
        }        
        $manager->flush();
    }
}