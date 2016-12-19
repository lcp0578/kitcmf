<?php

namespace Kit\InquireBundle\Controller;

use KitBaseBundle\Controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitInquireBundle:Default:index.html.twig');
    }
}
