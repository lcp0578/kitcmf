<?php
namespace KitNewsBundle\Controller;

use KitBaseBundle\Controller\BaseController;
use KitNewsBundle\Entity\Category;
use KitNewsBundle\Form\Type\CategoryType;

class CategoryController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitNewsBundle:Category:index.html.twig');
    }
    
    public function addAction()
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        return $this->render('KitNewsBundle:Category:add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}