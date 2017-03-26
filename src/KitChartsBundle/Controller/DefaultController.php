<?php

namespace KitChartsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitChartsBundle:Default:index.html.twig');
    }
}
