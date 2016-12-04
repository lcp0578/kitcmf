<?php

namespace Kit\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitNewsBundle:Default:index.html.twig');
    }
}
