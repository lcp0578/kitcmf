<?php

namespace KitNewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitNewsBundle:Default:index.html.twig');
    }
}
