<?php
// src/AppBundle/DataFixtures/ORM/LoadOrganization.php

namespace AppBundle\DataFixtures\ORM; 


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use AppBundle\Entity\Organization;

class LoadOrganizationData implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $items = array(
            '安宁里',
            '二炮清河大院',
            '长城润滑油公司',
            '华祥苑',
            '空军研究所',
            '总装小营',
            '加气混凝土厂',
            '体大颐清园',
            '花园楼',
            '毛纺南小区',
            '毛纺北小区',
            '北毛',
            '安宁东路',
            '阳光'
        );

        $code = '100000001';
        $enabled = false;
        
        $city = new Organization();
        $city->setName('北京市');
        $city->setCode($code);
        $city->setEnabled($enabled);
        $manager->persist($city);
        
        $district = new Organization();
        $district->setName('海淀区');
        $district->setParent($city);
        $district->setCode($code);
        $district->setEnabled($enabled);
        $manager->persist($district);        

        $subdistrict = new Organization();
        $subdistrict->setName('清河街道');        
        $subdistrict->setParent($district);
        $subdistrict->setCode($code);
        $subdistrict->setEnabled($enabled);
        $manager->persist($subdistrict);
        
        foreach ($items as $item){
            $organization = new Organization();
            $organization->setName($item);
            $organization->setParent($subdistrict);
            $organization->setCode($code);
            $organization->setEnabled($enabled);
            $manager->persist($organization);
        }        
        $manager->flush();
    }
}