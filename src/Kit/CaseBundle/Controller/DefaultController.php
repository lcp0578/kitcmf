<?php

namespace Kit\CaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/case")
     */
    public function indexAction()
    {
        return $this->render('KitCaseBundle:Default:index.html.twig');
    }
}
