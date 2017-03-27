<?php

namespace KitFriendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitFriendBundle:Default:index.html.twig');
    }
}
