<?php

namespace Application\Sonata\UserBundle\Admin;

use Sonata\UserBundle\Admin\Entity\UserAdmin as BaseUserAdmin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Application\Sonata\UserBundle\Entity\User as User;



class UserAdmin extends BaseUserAdmin
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
        // define group zoning
        $formMapper
        ->tab('User')
        ->with('Profile', array('class' => 'col-md-6'))->end()
        ->with('General', array('class' => 'col-md-6'))->end()
        ->with('Social', array('class' => 'col-md-6'))->end()
        ->end()
        ->tab('Security')
        ->with('Status')->end()
        ->with('Groups')->end()        
        ->end()
        ;
        
        $now = new \DateTime();
        
        $formMapper
        ->tab('User')
        ->with('General')
        ->add('username')
        ->add('email')
        ->add('plainPassword', 'text', array(
            'required' => (!$this->getSubject() || is_null($this->getSubject()->getId())),
        ))
        ->end()
        ->with('Profile')
        ->add('firstname', null, array('required' => false))
        ->add('lastname', null, array('required' => false))
        ->add('gender', 'sonata_user_gender', array(
            'required'           => true,
            'translation_domain' => $this->getTranslationDomain(),
        ))
        ->add('phone', null, array('required' => false))
        ->add('organization', 'cvms_organization_selector', array(
            'required'=>true,
            'class' => 'AppBundle\Entity\Organization', // tree class
        ))        
        ->end()
        ->with('Social')
        ->add('wechat', 'entity', array(
            'class' => 'AppBundle\Entity\WechatSubscriber',
            'property' => 'wechatId',
            'required' => false
        ))
        ->end()
        ->end()
        ;
        
        if ($this->getSubject() && !$this->getSubject()->hasRole('ROLE_SUPER_ADMIN')) {
            $formMapper
            ->tab('Security')
            ->with('Status')
            ->add('locked', null, array('required' => false))
            ->add('expired', null, array('required' => false))
            ->add('enabled', null, array('required' => false))
            //->add('credentialsExpired', null, array('required' => false))
            ->end()
            ->with('Groups')
            ->add('groups', 'sonata_type_model', array(
                'required' => false,
                'expanded' => true,
                'multiple' => true,
            ))
            ->end()
            ->end()
            ;
        }
                
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
        $listMapper
            ->addIdentifier('username')
            ->add('email')
            ->add('groups')
            ->add('enabled', null, array('editable' => true))
            ->add('locked', null, array('editable' => true))
            ->add('createdAt')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
    
        // step1: filter user with user type
        $query->andWhere(
            $query->expr()->eq($query->getRootAlias().'.autoType', ':autoType')
        );
        $query->setParameter('autoType', User::USER_TYPE_STAFF); // eg get from security context
    
        // step2: filter user with organization, ROLE_SUPER_ADMIN has no organization, show all the results
    
        return $query;
    }
    
    public function prePersist($user)
    {
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setAutoType(User::USER_TYPE_STAFF);        
    }
}
