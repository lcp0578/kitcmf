<?php

namespace Kit\AnalysisBundle\Controller;

use KitBaseBundle\Controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitAnalysisBundle:Default:index.html.twig');
    }
}
