<?php


// src/AppBundle/Admin/VolunteerLevelParamsAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Datagrid\DatagridMapper;

class VolunteerLevelParamsAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        // ... configure $formMapper
        
        $formMapper
        ->with('General', array('class' => 'col-md-5'))->end()
        ->with('Options', array('class' => 'col-md-7'))->end()
        ;
        
        $formMapper
        ->with('General')
            ->add('level')
            ->add('point_min')
            ->add('point_max')        
        ->end()
        ->with('Options')
            ->add('adult')
            ->add('organization','sonata_type_model_list')        
        ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
            // ... configure $listMapper
        $listMapper
            ->addIdentifier('level')
            ->add('point_min')
            ->add('point_max')
            ->add('adult')
            ->add('organization')
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        
        $datagridMapper
        ->add('level')
        ;
    }
    
    public function prePersist($user)
    {
        if($user->getOrganization() == null){
            $user->setOrganization($this->securityContext->getToken()->getUser()->getOrganization());
        }    
    }
    
}