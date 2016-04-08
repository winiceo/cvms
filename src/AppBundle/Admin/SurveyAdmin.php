<?php


// src/AppBundle/Admin/EducationStatusAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Datagrid\DatagridMapper;

class SurveyAdmin extends Admin
{
    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name',null,array(
                'label' => 'name'))
            ->add('questions',null,array(
                'label' => 'questions'))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        // ... configure $formMapper
        
        
        //use groups and sonata_type_model(entity) tof config form fields

        $formMapper
            ->with('name', array('class' => 'col-md-12'))
            ->add('name')
            ->end()
            ->with('questions', array('class' => 'col-md-12'))
            ->add('questions', 'sonata_type_collection', array(
                'by_reference'       => false,
                'cascade_validation' => true,
            ), array(
                'edit' => 'inline',
                'inline' => 'table'
            ))
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
            // ... configure $listMapper
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('name', null, array(
                'route' => array('name' => 'show')
            ))
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        //$datagridMapper->add('title');
        
        $datagridMapper
        ->add('name')
        ;
    }
    
}