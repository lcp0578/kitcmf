<?php

namespace KitDnspodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitDnspodBundle:Default:index.html.twig');
    }
    
    public function testAction()
    {
        $guzzleHttp = $this->get('kit.guzzle_http');
        return new JsonResponse();
    }
}
