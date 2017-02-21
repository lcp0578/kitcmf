<?php
namespace KitDnspodBundle\Controller;


class RecordController extends BaseController
{

    public function indexAction()
    {
        return $this->render('KitDnspodBundle:Default:index.html.twig');
    }

}
