<?php

namespace KitUserBundle\Controller;

use KitBaseBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/user/index")
     */
    public function indexAction()
    {
        return $this->render('KitUserBundle:Default:index.html.twig');
    }
}
