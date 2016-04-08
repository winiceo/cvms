<?php


// src/AppBundle/Admin/EducationStatusAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Datagrid\DatagridMapper;

class ActivityAdmin extends Admin
{

    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('tab_general')
            ->add('name')
            ->add('createdAt')
            ->add('startAt')
            ->add('endAt')
            ->add('type')
            ->add('public')
            ->add('location')
            ->add('limited')
            ->add('score')
            ->end()
            ->with('tab_apply')
            ->add('applys', 'sonata_type_collection', array(
                'required' => false,
                'cascade_validation' => true,
                'by_reference' => false,
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
            ))
            ->end()
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('name', null, array(
                'route' => array('name' => 'show')
            ))
            ->add('createdAt')
            ->add('startAt')
            ->add('endAt')
            ->add('type')
            ->add('public')
            ->add('location')
            ->add('limited')
            ->add('score')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('name')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('createdAt')
            ->add('startAt')
            ->add('endAt')
            ->add('type')
            ->add('public')
            ->add('location')
            ->add('limited')
            ->add('score')
            ->add('applys', 'sonata_type_collection', array(
                'by_reference'       => false,
                'cascade_validation' => true,
            ), array(
                'edit' => 'inline',
                'inline' => 'table'
            ))
        ;
    }
}