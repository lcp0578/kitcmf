<?php

namespace Kit\ArchiveBundle\Controller;

use KitBaseBundle\Controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitArchiveBundle:Default:index.html.twig');
    }
}
