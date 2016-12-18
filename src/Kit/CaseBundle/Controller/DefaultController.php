<?php

namespace Kit\CaseBundle\Controller;

use KitBaseBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/case")
     */
    public function indexAction()
    {
        return $this->render('KitCaseBundle:Default:index.html.twig');
    }
}
