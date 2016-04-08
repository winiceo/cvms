<?php


// src/AppBundle/Admin/EducationStatusAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Datagrid\DatagridMapper;

class QuestionAdmin extends Admin
{
    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('expanded')
            ->add('multiple')
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
            ->add('expanded')
            ->add('multiple')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('general', array('class' => 'col-md-12'))
            ->add('name')
            ->add('expanded')
            ->add('multiple')
            ->end()
            ->with('choices', array('class' => 'col-md-12'))
            ->add('choices', 'sonata_type_collection', array(
                'by_reference'       => false,
                'cascade_validation' => true,
            ), array(
                'edit' => 'inline',
                'inline' => 'table'
            ))
            ->end()
            ;
    }
}