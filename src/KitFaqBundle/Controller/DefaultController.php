<?php

namespace KitFaqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitFaqBundle:Default:index.html.twig');
    }
}
