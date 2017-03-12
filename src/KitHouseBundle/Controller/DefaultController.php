<?php

namespace KitHouseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitHouseBundle:Default:index.html.twig');
    }
}
