<?php
namespace KitRbacBundle\Controller;

use KitBaseBundle\Controller\BaseController;
use KitRbacBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DefaultController extends BaseController
{

    public function indexAction()
    {
        return $this->render('KitRbacBundle:Default:index.html.twig');
    }
    /**
     * add user
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $em = $this->getEntityManager();
        $user = new User();
        
        $form = $this->createFormBuilder($user)
            ->add('username')
            ->add('password', PasswordType::class)
            ->add('role_id')
            ->add('status', ChoiceType::class, [
                'choices'  => [
                    '启用' => 1,
                    '禁用' => 0
                ],
                'expanded' => true
            ])
            ->add('submit', SubmitType::class)
            ->getForm();
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /**
             */
            $user = $form->getData();
            $user->setIp($request->getClientIp());
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->redirectToRoute('kit_rbac_homepage');
        }
        return $this->render('KitRbacBundle:Default:add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function delAction()
    {
        return $this->render('KitRbacBundle:Default:index.html.twig');
    }
}
