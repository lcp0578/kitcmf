<?php
namespace KitNewsBundle\Controller;

use KitBaseBundle\Controller\BaseController;
use KitNewsBundle\Entity\Classify;
use KitNewsBundle\Form\Type\ClassifyType;

class ClassifyController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitNewsBundle:Classify:index.html.twig');
    }
    
    public function addAction()
    {
        $classify = new Classify();
        $form = $this->createForm(ClassifyType::class, $classify);
        return $this->render('KitNewsBundle:Classify:add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}