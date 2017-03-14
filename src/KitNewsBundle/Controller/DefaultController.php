<?php

namespace KitNewsBundle\Controller;

use KitBaseBundle\Controller\BaseController;
use KitNewsBundle\Form\Type\NewsContentType;
use KitNewsBundle\Entity\NewsContent;
use KitNewsBundle\Entity\News;
use KitNewsBundle\Form\Type\NewsType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitNewsBundle:Default:index.html.twig');
    }
    
    public function addAction(Request $request)
    {
        $errors = [];
        $news = new News();
        $content = new NewsContent();
        $news->setContent($content);
        $form = $this->createForm(NewsType::class, $news);
        
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                /**
                 */
                $news = $form->getData();
//                 $content->setContent($news['content']);
//                 unset($news['content']);
                $em->persist($news);
//                 $em->persist($content);
                $em->flush();
                return $this->msgResponse(0, '恭喜', '添加成功', 'kit_news_list');
            }else{
                $errors = $this->serializeFormErrors($form);
            }
        }
        return $this->render('KitNewsBundle:Default:add.html.twig',[
            'form' => $form->createView(),
            'errors' => $errors
        ]);
    }
}
