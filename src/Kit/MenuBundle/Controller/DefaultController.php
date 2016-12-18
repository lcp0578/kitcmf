<?php

namespace Kit\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitMenuBundle:Default:index.html.twig');
    }
}
