<?php

namespace KitVideoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitVideoBundle:Default:index.html.twig');
    }
}
