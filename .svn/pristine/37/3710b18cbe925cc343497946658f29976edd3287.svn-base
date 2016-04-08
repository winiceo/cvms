<?php


// src/AppBundle/Admin/WechatSubscriberAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;


class WechatSubscriberAdmin extends Admin
{ 
     protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('wechat_id', 'text');
    }
   
    
    protected function configureListFields(ListMapper $listMapper)
    {
            // ... configure $listMapper
        $listMapper
            ->addIdentifier('wechat_id');
    }
}