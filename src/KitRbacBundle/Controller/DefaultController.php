<?php

namespace KitRbacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitRbacBundle:Default:index.html.twig');
    }
    
    public function addAction()
    {
        return $this->render('KitRbacBundle:Default:index.html.twig');
    }
    
    
    public function delAction()
    {
        return $this->render('KitRbacBundle:Default:index.html.twig');
    }
}
