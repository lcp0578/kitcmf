<?php

namespace Kit\WarningBundle\Controller;

use KitBaseBundle\Controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitWarningBundle:Default:index.html.twig');
    }
}
