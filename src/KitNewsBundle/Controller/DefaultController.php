<?php

namespace KitNewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use KitBaseBundle\Controller\BaseController;
use KitNewsBundle\Form\Type\NewsContentType;
use KitNewsBundle\Entity\NewsContent;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitNewsBundle:Default:index.html.twig');
    }
    
    public function addAction()
    {
        $content = new NewsContent();
        $form = $this->createForm(NewsContentType::class, $content);
        return $this->render('KitNewsBundle:Default:add.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
