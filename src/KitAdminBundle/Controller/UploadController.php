<?php
namespace KitAdminBundle\Controller;

use KitBaseBundle\Controller\BaseController;

class UploadController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitAdminBundle:Upload:index.html.twig');
    }
}