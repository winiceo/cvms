<?php

namespace AppBundle\Admin;

use Sonata\UserBundle\Admin\Entity\UserAdmin as BaseUserAdmin;

use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Security\Core\SecurityContextInterface;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Application\Sonata\UserBundle\Entity\User as User;

class VolunteerAdmin extends BaseUserAdmin
{
    //necessary to change route
    protected $baseRouteName = 'admin_volunteer';    
    protected $baseRoutePattern = 'volunteer';
    
    protected $securityContext;
    
    public function setSecurityContext(SecurityContextInterface $securityContext)
    {
        $this->securityContext = $securityContext;
    }
        
    /**
     * {@inheritdoc}
     */
    public function getFormBuilder(){
        
        $formBuilder = parent::getFormBuilder();
        $formBuilder->addEventListener(FormEvents::PRE_SUBMIT,
            function (FormEvent $event)  
            {
                $data = $event->getData();
                
                if(!array_key_exists('username',$data)){
                    
                    $form = $event->getForm();
                    $form->add('username','hidden');
                    $form->add('plainPassword','hidden');
                                        
                    $wechat = $data['wechat'];
                    $unique =  $wechat ? $wechat : uniqid('', true);
                    
                    $data['username'] = $unique;
                    $data['plainPassword'] = $unique;
                    
                    $event->setData($data);
                }
            },
            255);   
        return $formBuilder;
    }    
    
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
        
        $formMapper
        ->tab('Volunteer')
            ->with('General',array('class' => 'col-md-12'))
                ->add('firstname')
                ->add('lastname')
                ->add('gender', 'sonata_user_gender', array(
                    'required'           => true,
                    'translation_domain' => $this->getTranslationDomain(),
                ))        
                ->add('email')        
                ->add('identityNum',null,array('required'=>true))        
                ->add('phone', null, array('required' => false))
                ->add('politics', 'entity', array(
                    'class'    => 'AppBundle\Entity\PoliticalStatus',
                    'property' => 'party',
                    'required'=> false,
                ))
                ->add('education', 'entity', array(
                    'class'    => 'AppBundle\Entity\EducationStatus',
                    'property' => 'professional_title',
                    'required'=> false,
                ))
                ->add('nation', 'entity', array(
                    'class'    => 'AppBundle\Entity\NationStatus',
                    'property' => 'nation',
                    'required'=> false,
                ))
                ->add('gender', 'sonata_user_gender', array(
                    'required' => true,
                    'translation_domain' => $this->getTranslationDomain()
                ))            
                ->add('wechat', 'entity', array(
                    'class' => 'AppBundle\Entity\WechatSubscriber',
                    'property' => 'wechatId',
                    'required' => false,
                ))                
            ->end()
            ->with('Status')
                ->add('locked', null, array('required' => false))
                ->add('enabled', null, array('required' => false))            
            ->end()
        ->end();
                
                                            
        if($this->isGranted('ROLE_SUPER_ADMIN')){
            $formMapper
            ->tab('Volunteer')
                ->with('General',array('class' => 'col-md-12'))
                    ->add('organization', 'cvms_organization_selector', array(
                        'required'=>false,
                        'class' => 'AppBundle\Entity\Organization', // tree class
                    ))            
                ->end()    
            ->end();
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
        ->add('firstname')
        ->add('lastname')        
        ->add('email')
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
        
        //filter user with user type        
        $query->andWhere(
            $query->expr()->eq($query->getRootAlias().'.autoType', ':autoType')
        );
        $query->setParameter('autoType', User::USER_TYPE_VOLUNTEER);
        
        return $query;        
    }
        
    public function prePersist($user)
    {
        if($user->getOrganization() == null){
            $user->setOrganization($this->securityContext->getToken()->getUser()->getOrganization());
        }        
        
        if(!$user->hasRole('ROLE_REGISTERED_USER')){
            $user->setRoles(array('ROLE_REGISTERED_USER'));
        }        
        
        $user->setAutoType(User::USER_TYPE_VOLUNTEER);
    }
    
}
