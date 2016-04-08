<?php


// src/AppBundle/Admin/PoliticalStatusAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Sonata\AdminBundle\Datagrid\DatagridMapper;

class PoliticalStatusAdmin extends Admin
{
    
    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $show)
    {
        $show->add('party', 'text');
    }
    
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        // ... configure $formMapper
        
        
        //use groups and sonata_type_model(entity) tof config form fields
        
        $formMapper
        ->add('party', 'text')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
            // ... configure $listMapper
        $listMapper
            ->addIdentifier('party');
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        //$datagridMapper->add('title');
        
        $datagridMapper
        ->add('party')
        ;
    }
    
}