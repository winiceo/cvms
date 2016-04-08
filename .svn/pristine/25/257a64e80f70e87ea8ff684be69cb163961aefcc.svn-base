<?php


// src/AppBundle/Admin/UnitAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;


use Sonata\AdminBundle\Datagrid\DatagridMapper;

class CounitAdmin extends Admin
{
    
    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $show)
    {
        $show
        ->add('name', 'text')
        ->add('contacts','text')
        ->add('mobile','text')
        ->add('counit_type')        
        ;        
    }    
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        // ... configure $formMapper
        
        //use groups and sonata_type_model tof config form fields
        
        $formMapper
        ->add('name', 'text')
        ->add('contacts','text')
        ->add('mobile','text')
        ->add('counit_type', 'sonata_type_model_list')        
        ;

    }

    protected function configureListFields(ListMapper $listMapper)
    {
            // ... configure $listMapper
        $listMapper
            ->addIdentifier('name')
            ->add('contacts')
            ->add('mobile')
            ->add('counit_type.name')
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        
        $datagridMapper
        ->add('name')
        ->add('counit_type', null, array(), 'entity', array(
            'class'    => 'AppBundle\Entity\CounitType',
            'property' => 'name',
        ))
        ;
    }
    
}
