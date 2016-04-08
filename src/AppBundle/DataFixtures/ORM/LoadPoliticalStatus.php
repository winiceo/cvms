<?php
// src/AppBundle/DataFixtures/ORM/LoadPoliticalStatus.php

namespace AppBundle\DataFixtures\ORM; 


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use AppBundle\Entity\PoliticalStatus;

class LoadPoliticalStatusData implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $items = array(
            '中国共产党员',
            '中国共产党预备党员',
            '中国共产党党员（保留团籍）',
            '中国共产主义青年团团员',
            '中国国民党革命委员会会员',
            '中国民主同盟盟员',
            '中国民主建国会会员',
            '中国民主促进会会员',
            '中国农工民主党党员',
            '中国致公党党员',
            '九三学社社员',
            '台湾民主自治同盟盟员',
            '无党派民主人士',
            '中国少年先锋队队员',
            '群众'
        );
        foreach ($items as $item){
            $politicalStatus = new PoliticalStatus();
            $politicalStatus->setParty($item);
            $manager->persist($politicalStatus);
        }
        $manager->flush();
    }
}