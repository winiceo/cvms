<?php


// src/AppBundle/Admin/VolunteerLevelParamsAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Datagrid\DatagridMapper;

class VolunteerPointParamsAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        // ... configure $formMapper        
        $formMapper
        ->add('clear')
        ->add('notify')
        ->add('clearDate')
        ->add('organization','sonata_type_model_list')
        ;        
    }

    protected function configureListFields(ListMapper $listMapper)
    {
            // ... configure $listMapper
        $listMapper
        ->addIdentifier('clearDate')
        ->add('clear',null,array('editable' => true))
        ->add('notify',null,array('editable' => true))        
        ->add('organization','sonata_type_model_list')
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        
        $datagridMapper
        ->add('organization')
        ;
    }
    
    public function prePersist($user)
    {
        if($user->getOrganization() == null){
            $user->setOrganization($this->securityContext->getToken()->getUser()->getOrganization());
        }    
    }
    
}