<?php

/*
 * This file is modified from CategoryAdminController to suppoert tree action
 * 
 */

namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Organization Admin Controller
 *
 * @author Andy <2370792532@qq.com>
 */
class OrganizationAdminController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request = null)
    {        
        if (!$request->get('filter') && !$request->get('filters')) {
            return new RedirectResponse($this->admin->generateUrl('tree'));
        }
        
        if ($listMode = $request->get('_list_mode')) {
            $this->admin->setListMode($listMode);
        }
        
        $datagrid = $this->admin->getDatagrid();
        
        if ($this->admin->getPersistentParameter('name')) {
            $datagrid->setValue('name', null, $this->admin->getPersistentParameter('name'));
        }
        
        $formView = $datagrid->getForm()->createView();
        
        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($formView, $this->admin->getFilterTheme());
        
        return $this->render($this->admin->getTemplate('list'), array(
            'action'     => 'list',
            'form'       => $formView,
            'datagrid'   => $datagrid,
            'csrf_token' => $this->getCsrfToken('sonata.batch'),
        ));
        
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function treeAction(Request $request)
    {        
        $repository = $this->getDoctrine()->getRepository('AppBundle:Organization');//$this->getClass()
        
        $currentTop = false;
        if ($top = $request->get('top')) {
            $currentTop = $repository->find($top);
        }
        
        $qb = $repository->getRootNodesQueryBuilder();
        $topOrganizations = $qb->getQuery()->getResult();
        
        if (!$currentTop) {
            $mainOrganization   = current($topOrganizations);
            $currentTop = $mainOrganization;
        } else {
            foreach($topOrganizations as $organization) {
                if ($currentTop->getId() != $organization->getId()) {
                    continue;
                }        
                $mainOrganization = $organization;        
                break;
            }
        }
        
        $datagrid = $this->admin->getDatagrid();
        
        if ($this->admin->getPersistentParameter('name')) {
            $datagrid->setValue('name', ChoiceType::TYPE_EQUAL, $this->admin->getPersistentParameter('name'));
        }
        
        $formView = $datagrid->getForm()->createView();
        
        $this->get('twig')->getExtension('form')->renderer->setTheme($formView, $this->admin->getFilterTheme());
       
        dump($currentTop);
        
        return $this->render('AppBundle:OrganizationAdmin:tree.html.twig', array(
            'action'           => 'tree',
            'main_organization'    => $mainOrganization,
            'top_organizations'  => $topOrganizations,
            'current_top'  => $currentTop,
            'form'             => $formView,
            'csrf_token'       => $this->getCsrfToken('sonata.batch'),
        ));

     }
    
}