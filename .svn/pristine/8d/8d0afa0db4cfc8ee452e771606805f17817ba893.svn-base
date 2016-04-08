<?php

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Admin\Extension;

use Sonata\AdminBundle\Admin\AdminExtension;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @author Emmanuel Vella <vella.emmanuel@gmail.com>
 */
class OrganizationFilterAdminExtension extends AdminExtension
{
    /**
     * @var TokenStorageInterface
     */
    protected $tokenStorage;
    
    /**
     * @var EntityManagerInterface
     */
    protected $em;
    
    /**
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage,
        EntityManagerInterface $em
    ){
        $this->tokenStorage = $tokenStorage;
        $this->em = $em;        
    }
    
    /**
     * Filters with Organizaton
     *
     * @param  AdminInterface      $admin
     * @param  ProxyQueryInterface $query
     * @param  string              $context
     * @throws \RuntimeException
     */
    public function configureQuery(AdminInterface $admin, ProxyQueryInterface $query, $context = 'list')
    {                
       //filter admin with organization, ROLE_SUPER_ADMIN has no organization, show all the results 
        $repository = $this->em->getRepository('AppBundle:Organization');         
        $organization = $this->tokenStorage->getToken()->getUser()->getOrganization();
        
        $organizaitons = array();
        if($organization == null){
        
        
        }else{
            $organizaitons[] = $organization->getId();
            $childrens = $repository->children($organization);
            foreach ($childrens as $children){
                $organizaitons[] = $children->getId();
            }            
            $query->andWhere(
                $query->expr()->in($query->getRootAlias().'.organization', ':organizaitons')
            );
            // eg get from security context
            $query->setParameter('organizaitons',$organizaitons);
        }
    }
    
}
