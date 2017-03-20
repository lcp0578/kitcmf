<?php

namespace KitCommandBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitCommandBundle:Default:index.html.twig');
    }
}
