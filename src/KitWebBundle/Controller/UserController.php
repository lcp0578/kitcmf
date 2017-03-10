<?php
namespace KitWebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use KitWebBundle\Form\WebUserType;
use KitWebBundle\Entity\WebUser;

class UserController extends Controller
{

    public function indexAction()
    {
        return $this->render('KitWebBundle:User:index.html.twig');
    }

    public function registerAction(Request $request)
    {
        // Create a new blank user and process the form
        $user = new WebUser();
        $form = $this->createForm(WebUserType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the new users password
            $encoder = $this->get('security.password_encoder');
            $password = $encoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            
            // Set their role
            $user->setRole('ROLE_USER');
            
            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->redirectToRoute('kit_web_login');
        }
        
        return $this->render('KitWebBundle:User:register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function loginAction(Request $request)
    {
        $helper = $this->get('security.authentication_utils');
        
        return $this->render('KitWebBundle:User:login.html.twig', array(
            'last_username' => $helper->getLastUsername(),
            'error' => $helper->getLastAuthenticationError()
        ));
    }

    public function loginCheckAction()
    {}

    public function logoutAction()
    {}
}