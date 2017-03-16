<?php

namespace KitBbsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitBbsBundle:Default:index.html.twig');
    }
}
