<?php
namespace KitDnspodBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends BaseController
{

    public function indexAction()
    {
        return $this->render('KitDnspodBundle:Default:index.html.twig');
    }

    public function versionAction()
    {
        $result = $this->request('Info.Version');
        var_dump($result);        
        return new JsonResponse($result);
    }
    
    public function userAction()
    {
        $result = $this->request('User.Detail');
        return new JsonResponse($result);
    }
    
    public function logAction()
    {
        $result = $this->request('User.Log');
        return new JsonResponse($result);
    }
}
