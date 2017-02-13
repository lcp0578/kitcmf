<?php

namespace KitAdminBundle\Controller;

use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class LoginController extends Controller
{
    public function loginAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $username = $request->get('username', '');
        $username = $request->query->get('_username');
        $password = $request->query->get('_password');
        if(isset($username) && isset($password))
        {
            $userInfo = $em->getRepository('AlarmComponent:User')->findOneBy(array('username'=>$username));
            if(!empty($userInfo))
            {
                $passwordStr = $userInfo->getPassword();
                if (password_verify($password,$passwordStr)) {
                    $token = new UsernamePasswordToken($userInfo->getUsername(), $password, 'lot_admin', array('ROLE_USER'));
                    $this->get('security.token_storage')->setToken($token);
                    $token->setUser($userInfo);
                    $this->get('session')->set('_security_main', serialize($token));
                    return $this->redirectToRoute('linkadmin_index');
                }
                $this->setFlashMessage('danger','用户名和密码不匹配');
            }else{
                $this->setFlashMessage('danger','用户名和密码不匹配');
            }
        }
//        $authenticationUtils = $this->get('security.authentication_utils');
//
//        // get the login error if there is one
//        $error = $authenticationUtils->getLastAuthenticationError();
//
//        // last username entered by the user
//        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('KitAdminBundle:Login:login.html.twig', array(
        ));
    }

    public function logoutAction()
    {
        return $this->redirectToRoute('kit_admin_login', [], 302);
    }

}
