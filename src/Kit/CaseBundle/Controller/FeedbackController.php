<?php

namespace Kit\CaseBundle\Controller;

use KitBaseBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FeedbackController extends BaseController
{
    /**
     * @Route("/case", name="kit_case_feedback")
     */
    public function indexAction()
    {
        return $this->render('KitCaseBundle:Default:index.html.twig');
    }
}
