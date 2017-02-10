<?php
namespace KitNewsBundle\Controller;

use KitBaseBundle\Controller\BaseController;
use KitNewsBundle\Entity\Category;
use KitNewsBundle\Form\Type\CategoryType;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends BaseController
{
    public function indexAction($page)
    {
        if($page < 1) $page = 1;
        $pagesize = 5;
        /**
         * @var $repo \KitNewsBundle\Repository\CategoryRepository
         */
        $repo = $this->getDoctrine()->getRepository('KitNewsBundle:Category');
        $list = $repo->getList();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $list,
            $page,
            $pagesize
        );
        return $this->render('KitNewsBundle:Category:index.html.twig',[
            'pagination' => $pagination
        ]);
    }
    
    public function addAction(Request $request)
    {
        $errors = [];
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        
        $form->handleRequest($request);
        
        $em = $this->getEntityManager();
        
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                /**
                 */
                $category = $form->getData();
                $em->persist($category);
                $em->flush();
                return $this->msgResponse(0, '恭喜', '添加成功', 'kit_news_category');
            } else {
                $errors = $this->serializeFormErrors($form);
            }
        }
        return $this->render('KitNewsBundle:Category:add.html.twig', [
            'form' => $form->createView(),
            'errors' => $errors
        ]);
    }
}