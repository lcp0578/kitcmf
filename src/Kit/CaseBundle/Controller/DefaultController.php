<?php

namespace Kit\CaseBundle\Controller;

use KitBaseBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/addmin_case", name="kit_case_index")
     */
    public function indexAction()
    {
        return $this->render('KitCaseBundle:Default:index.html.twig');
    }
    
    /**
     * @Route("/case/register", name="kit_case_register")
     */
    public function registerAction()
    {
        return $this->render('KitCaseBundle:Default:index.html.twig');
    }
}
