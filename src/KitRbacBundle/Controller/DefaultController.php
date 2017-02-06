<?php
namespace KitRbacBundle\Controller;

use KitBaseBundle\Controller\BaseController;
use KitRbacBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
        $errors = [];
        $em = $this->getEntityManager();
        $user = new User();
        
        $form = $this->createFormBuilder($user)
            ->add('username', null, ['label' => '用户名'])
            ->add('password', PasswordType::class, ['label' => '密码'])
            ->add('role', EntityType::class, [
                'class' => 'KitRbacBundle:Role',
                'choice_label' => 'rolename',
                'label' => '用户组'
            ])
            ->add('status', ChoiceType::class, [
                'choices'  => [
                    '启用' => 1,
                    '禁用' => 0
                ],
                'expanded' => true,
                'label' => '状态',
                'label_attr' => [
                    'class' =>'radio-inline'
                    ]
            ])
            ->add('submit', SubmitType::class, ['label' => '提交'])
            ->getForm();
        
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                /**
                 */
                $user = $form->getData();
                $user->setIp($request->getClientIp());
                $em->persist($user);
                $em->flush();
                return $this->msgResponse(0, '恭喜', '添加成功', 'kit_rbac_user');
            }else{
                $errors = $this->serializeFormErrors($form);
            }
        }
        return $this->render('KitRbacBundle:Default:add.html.twig', [
            'form' => $form->createView(),
            'errors' => $errors
        ]);
    }

    public function delAction()
    {
        return $this->render('KitRbacBundle:Default:index.html.twig');
    }
}
