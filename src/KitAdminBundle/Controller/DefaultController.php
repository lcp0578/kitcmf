<?php

namespace KitAdminBundle\Controller;

use KitBaseBundle\Controller\BaseController;
use KitAdminBundle\Entity\Admin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('KitAdminBundle:Default:index.html.twig');
    }
    public function listAction()
    {
        $em = $this->getEntityManager();
        $list = $em->getRepository("KitAdminBundle:Admin")
                   ->getAllAdmins();
        dump($list);
        return $this->render('KitAdminBundle:Default:list.html.twig', [
            'list' => $list
        ]);
    }
    public function addAction(Request $request)
    {
        $admin = new Admin();
        
        $form = $this->createFormBuilder($admin)
                ->add('username')
                ->add('password', PasswordType::class)
                ->add('truename')
                ->add('cardid')
                ->add('number')
                ->add('gender')
                ->add('mobile')
                ->add('city_id')
                ->add('suboffice_id')
                ->add('job_title')
                ->add('admin_group_id')
                ->add('submit', SubmitType::class)
                ->getForm();
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            /**
             * 
             */
            $admin = $form->getData();
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();
            $this->redirectToRoute('kit_admin_add_success');
        }
        return $this->render('KitAdminBundle:Default:index.html.twig', [
            'form' =>$form->createView()
        ]);
    }
    
    public function addSuccessAction()
    {
        return new JsonResponse(['msg' => 'success']);
    }
}
