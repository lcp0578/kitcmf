<?php

namespace KitNewsBundle\Controller;

use KitBaseBundle\Controller\BaseController;
use KitNewsBundle\Form\Type\NewsContentType;
use KitNewsBundle\Entity\NewsContent;
use KitNewsBundle\Entity\News;
use KitNewsBundle\Form\Type\NewsType;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitNewsBundle:Default:index.html.twig');
    }
    
    public function addAction()
    {
        $news = new News();
        $content = new NewsContent();
        $news->setContent($content);
        $form = $this->createForm(NewsType::class, $news);
        
        
        return $this->render('KitNewsBundle:Default:add.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
