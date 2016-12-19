<?php

namespace Kit\MonitorBundle\Controller;

use KitBaseBundle\Controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitMonitorBundle:Default:index.html.twig');
    }
}
