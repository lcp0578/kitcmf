<?php

namespace KitBaseBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function baseAction(Request $request)
    {
//        $menuBulider = $this->get('kit.menu_builder');
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
//            'main' =>  $menuBulider->createMainMenu([]),
        ]);
    }
    /**
     * Get Entity Manager
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }

	/**
	 * Doctrine对象
	 * @return \Doctrine\Common\Persistence\ObjectManager|object
	 */
	public function em()
	{
		return $this->getDoctrine()->getManager();
	}

	/**
	 * @author  gf
	 * 创建消息提示响应
	 *
	 * @param  string     $type     消息类型（0为成功(success) 1为信息(info) 2为(primary) 3为警告(warning) 4为失败(danger) ）
	 * @param  string     $message  消息内容
	 * @param  integer    $goto     消息跳转的页面
	 * @param  string     $sec      消息提示的时间
	 * @return Response
	 */
	protected function createMessageResponse($type = 0,$message = '操作成功！', $goto = null, $sec = 3)
	{
		switch (intval($type))
		{
			case 0:
				$typeClass = 'success';
				break;
			case 1:
				$typeClass = 'info';
				break;
			case 2:
				$typeClass = 'primary';
				break;
			case 3:
				$typeClass = 'warning';
				break;
			case 4:
				$typeClass = 'danger';
				break;
		}

		return $this->render('KitAdminBundle:Common:message.html.twig', array(
			'sec'       =>  $sec,
			'type'      => $type,
			'message'   => $message,
			'url'       => $goto,
			'typeclass' => $typeClass
		));
	}

	/**
	 * @author  gf
	 *
	 * flash提示
	 *
	 * @param $level
	 * @param $message
	 */
	protected function setFlashMessage($level, $message)
	{
		$this->get('session')->getFlashBag()->add($level, $message);
	}

	/**
	 * @return \Doctrine\Common\Persistence\ObjectRepository
	 */
	public function getCaseRegisterRepository()
	{
		return $this->em()->getRepository('KitCaseBundle:CaseRegister');
	}
}

