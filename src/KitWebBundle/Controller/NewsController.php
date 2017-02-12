<?php

namespace KitWebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitWebBundle:News:index.html.twig');
    }
    
    public function showAction($uuid)
    {
        return $this->render('KitWebBundle:News:show.html.twig');
    }
}