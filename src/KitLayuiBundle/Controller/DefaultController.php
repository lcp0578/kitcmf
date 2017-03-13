<?php

namespace KitLayuiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitLayuiBundle:Default:index.html.twig');
    }
}
