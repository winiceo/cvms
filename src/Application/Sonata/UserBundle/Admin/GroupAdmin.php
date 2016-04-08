<?php

namespace Application\Sonata\UserBundle\Admin;


use Sonata\UserBundle\Admin\Entity\GroupAdmin as BaseGroupAdmin;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\Admin;

class GroupAdmin extends BaseGroupAdmin
{        
    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
       parent::configureShowFields($showMapper);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        parent::configureDatagridFilters($filterMapper);
    }
    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        parent::configureListFields($listMapper);
    }
    
    /**
     * {@inheritdoc}
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);    
        return $query;
    }
    
    public function prePersist($group)
    {
        if($group->getOrganization() == null){            
            $tokenStorage = $this->getConfigurationPool()->getContainer()->get('security.token_storage');
            $user = $tokenStorage->getToken()->getUser();
            $group->setOrganization($user->getOrganization());
        }
    }
}
