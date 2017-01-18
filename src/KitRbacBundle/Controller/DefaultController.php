<?php

namespace KitRbacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitRbacBundle:Default:index.html.twig');
    }
}
