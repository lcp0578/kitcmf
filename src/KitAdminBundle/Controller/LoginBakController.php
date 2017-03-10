<?php
namespace KitAdminBundle\Controller;

use Doctrine\Common\Util\Debug;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LoginBakController extends Controller
{

    public function loginAction(Request $request)
    {
        $errors = [];
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('kit_admin_login'))
            ->setMethod('POST')
            ->add('username', null, [
            'attr' => [
                'class' => 'input',
                'placeholder' => "登录账号",
                'data-validate' => "required:请填写账号,length#>=5:账号长度不符合要求"
            ]
        ])
            ->add('password', PasswordType::class, [
            'attr' => [
                'class' => 'input',
                'placeholder' => "登录密码",
                'data-validate' => "required:请填写密码,length#>=6:密码长度不符合要求"
            ]
        ])
            ->add('captcha', CaptchaType::class, [
            'width' => 80,
            'height' => 32,
            'length' => 4,
            'background_color' => [
                255,
                255,
                255
            ],
            'invalid_message' => '验证码错误',
            'as_url' => true,
            'reload' => $this->generateUrl('gregwar_captcha.generate_captcha', [
                'key' => uniqid('captcha_')
            ]),
            'attr' => [
                'class' => 'input',
                'placeholder' => "填写右侧的验证码",
                'data-validate' => "required:填写右侧的验证码"
            ]
        ])
            ->add('submit', SubmitType::class, [
                'label' => '提交',
                'attr' => [
                    'class' => 'button button-block bg-main text-big'
                    ]
            ])
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $formData = $form->getData();
                /**
                 * @var $userInfo \KitRbacBundle\Entity\User
                 */
                $userInfo = $em->getRepository('KitRbacBundle:User')->findOneBy([
                    'username' => $formData['username']
                ]);
                if(empty($userInfo)){
                    $errors[] = '用户不存在';
                }else{
                    $passhash = $userInfo->getPassword();
                    $passsalt = $userInfo->getSalt();
                    if(true === password_verify($formData['password'] . $passsalt, $passhash)){
                        if($userInfo->getStatus()){
                            // 设置session
                            $token = new UsernamePasswordToken($userInfo->getUsername(), $formData['password'], 'admin_firewalls', array('ROLE_ADMIN'));
                            $this->get('security.token_storage')->setToken($token);
                            $token->setUser($userInfo);
                            $this->get('session')->set('_security_main', serialize($token));
                            return $this->redirectToRoute('kit_admin_homepage');
                        }else{
                            $errors[] = '用户已被禁用';
                        }
                    }else{
                        $errors[] = '密码不正确';
                    }
                }
            } else {
                $errors = $this->serializeFormErrors($form);
            }
        }
        return $this->render('KitAdminBundle:Login:login.html.twig', [
            'form' => $form->createView(),
            'errors' => $errors
        ]);
    }

    public function logoutAction()
    {
        return $this->redirectToRoute('kit_admin_login', [], 302);
    }
}
