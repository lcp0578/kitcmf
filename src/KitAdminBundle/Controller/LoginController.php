<?php
namespace KitAdminBundle\Controller;

use Doctrine\Common\Util\Debug;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\HttpFoundation\JsonResponse;
use KitBaseBundle\Controller\BaseController;

class LoginController extends BaseController
{

    public function loginAction(Request $request)
    {
        $form = $this->createFormBuilder()
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
                'data-validate' => "required:请填写密码,length#>=8:密码长度不符合要求"
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
                $pass = $userInfo->getPassword();
                if(password_verify($password, $hash)){
                    
                }
                exit();
                dump($userInfo);
                // $user->setIp($request->getClientIp());
                // $em->persist($user);
                // $em->flush();
                return new JsonResponse([
                    $formData,
                    $userInfo
                ]);
            } else {
                $errors = $this->serializeFormErrors($form);
            }
        }
        // $username = $request->get('username', '');
        // $username = $request->query->get('_username');
        // $password = $request->query->get('_password');
        // if(isset($username) && isset($password))
        // {
        // $userInfo = $em->getRepository('AlarmComponent:User')->findOneBy(array('username'=>$username));
        // if(!empty($userInfo))
        // {
        // $passwordStr = $userInfo->getPassword();
        // if (password_verify($password,$passwordStr)) {
        // $token = new UsernamePasswordToken($userInfo->getUsername(), $password, 'lot_admin', array('ROLE_USER'));
        // $this->get('security.token_storage')->setToken($token);
        // $token->setUser($userInfo);
        // $this->get('session')->set('_security_main', serialize($token));
        // return $this->redirectToRoute('linkadmin_index');
        // }
        // $this->setFlashMessage('danger','用户名和密码不匹配');
        // }else{
        // $this->setFlashMessage('danger','用户名和密码不匹配');
        // }
        // }
        // $authenticationUtils = $this->get('security.authentication_utils');
        //
        // // get the login error if there is one
        // $error = $authenticationUtils->getLastAuthenticationError();
        //
        // // last username entered by the user
        // $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('KitAdminBundle:Login:login.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function logoutAction()
    {
        return $this->redirectToRoute('kit_admin_login', [], 302);
    }
}
