<?php


namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
/**
 * Survey Admin Controller
 *
 * @author chenshi <6131853@qq.com>
 */
class SurveyAdminController extends Controller
{
    /**
     * Show action.
     *
     * @param int|string|null $id
     * @param Request         $request
     *
     * @return Response
     *
     * @throws NotFoundHttpException If the object does not exist
     * @throws AccessDeniedException If access is not granted
     */
    public function showAction($id = null)
    {
        return $this->render('AppBundle:SurveyAdmin:show.html.twig');
     }
    
}