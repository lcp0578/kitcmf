<?php

namespace KitBackupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KitBackupBundle:Default:index.html.twig');
    }
}
