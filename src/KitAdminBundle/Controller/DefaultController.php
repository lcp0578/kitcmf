<?php

namespace KitAdminBundle\Controller;

use KitBaseBundle\Controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitAdminBundle:Default:index.html.twig');
    }
    public function listAction()
    {
        return $this->render('KitAdminBundle:Default:index.html.twig');
    }
    public function addAction()
    {
        return $this->render('KitAdminBundle:Default:index.html.twig');
    }
}
