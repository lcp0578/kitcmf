<?php

namespace KitWebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitWebBundle:Default:index.html.twig');
    }
}
