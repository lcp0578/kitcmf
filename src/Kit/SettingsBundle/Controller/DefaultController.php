<?php

namespace Kit\SettingsBundle\Controller;

use KitBaseBundle\Controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitSettingsBundle:Default:index.html.twig');
    }
}
