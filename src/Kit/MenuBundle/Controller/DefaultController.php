<?php

namespace Kit\MenuBundle\Controller;

use KitBaseBundle\Controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitMenuBundle:Default:index.html.twig');
    }
}
