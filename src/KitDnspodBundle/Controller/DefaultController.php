<?php

namespace KitDnspodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitDnspodBundle:Default:index.html.twig');
    }
}
