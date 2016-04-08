<?php


// src/AppBundle/Admin/OrganizationAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class OrganizationAdmin extends Admin
{    
    protected $formOptions = array(
        'cascade_validation' => true
    );    

    /**
     * {@inheritdoc}
     */
    public function configureRoutes(RouteCollection $routes)
    {
        $routes->add('tree', 'tree');
    }
    
    /**
     * (non-PHPdoc)
     * @see \Sonata\AdminBundle\Admin\Admin::configureFormFields()
     */   
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->with('General', array('class' => 'col-md-12'))
        ->add('name')
        ->add('description', 'textarea', array('required' => false))
        ->add('code', 'text', array('required' => true))        
        ->add('parent', 'cvms_organization_selector', array(
            'required'=>false,
            'class' => 'AppBundle\Entity\Organization', // tree class
            ))
        ->end()
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