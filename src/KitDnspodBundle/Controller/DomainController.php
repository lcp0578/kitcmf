<?php
namespace KitDnspodBundle\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
class DomainController extends BaseController
{

    public function indexAction()
    {
        return $this->render('KitDnspodBundle:Domain:index.html.twig');
    }
    
    public function listAction()
    {
        $result = $this->request('Domain.List');
        // 17kxgame 37951496
        return new JsonResponse($result);
    }

}