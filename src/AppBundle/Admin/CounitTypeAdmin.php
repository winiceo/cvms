<?php


// src/AppBundle/Admin/UnitAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Datagrid\DatagridMapper;

class CounitTypeAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        // ... configure $formMapper
        
        //use groups and sonata_type_model tof config form fields
        
        $formMapper
        ->add('name', 'text')
        ;

    }

    protected function configureListFields(ListMapper $listMapper)
    {
            // ... configure $listMapper
        $listMapper
            ->addIdentifier('name')
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        
        $datagridMapper
        ->add('name')
        ;
    }
    
}
