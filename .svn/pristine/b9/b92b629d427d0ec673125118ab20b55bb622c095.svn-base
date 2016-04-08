<?php


// src/AppBundle/Admin/NationStatusAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Sonata\AdminBundle\Datagrid\DatagridMapper;

class NationStatusAdmin extends Admin
{
    
    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $show)
    {
        $show->add('nation', 'text');
    }
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        // ... configure $formMapper
        
        
        //use groups and sonata_type_model(entity) tof config form fields
        
        $formMapper
        ->add('nation', 'text')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
            // ... configure $listMapper
        $listMapper
            ->addIdentifier('nation');
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        //$datagridMapper->add('title');
        
        $datagridMapper
        ->add('nation')
        ;
    }
    
}