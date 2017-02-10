<?php
/**
 * Author: lcp0578@gmail.com
 * 
 * Date: 2017/01/22
 * Time: 18:26
 */

namespace Kit\MenuBundle\Menu;
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AdminBuilder implements ContainerAwareInterface
{
	use ContainerAwareTrait;
    
	public function setContainer(ContainerInterface $container = null) 
	{
	    
	}
	public function mainMenu(FactoryInterface $factory, array $options)
	{
		$menu = $factory->createItem('root', ['label'=>'主菜单']);

		$menu->addChild('index', [
		    'route' => 'homepage', 
		    'label' => '首页',
		    'attributes' =>[
		        'icon' => 'icon-home'
		    ]
		]);
		$menu['index']->addChild('rabc', [
		    'route' => 'kit_rbac_user_del',
		    'label' => '删除管理员'
		]);
		// access services from the container!
		//$em = $this->container->get('doctrine')->getManager();
		// findMostRecent and Blog are just imaginary examples
		//$blog = $em->getRepository('KitAdminBundle:Admin')->findMostRecent();

		$menu->addChild('system', array(
			'route' => 'kit_rbac_user',
		    'label' => '系统',
		    'attributes' =>[
		        'icon' => 'icon-cog'
		    ]
			//'routeParameters' => array('id' => $blog->getId())
		));
		$menu['system']->addChild('rabc_user', [
		    'route' => 'kit_rbac_user',
		    'label' => '管理员列表'
		]);
		$menu['system']->addChild('rabc_user_add', [
		    'route' => 'kit_rbac_user_add',
		    'label' => '新增管理员'
		]);
		$menu['system']->addChild('rabc_role', [
		    'route' => 'kit_rbac_role',
		    'label' => '用户组列表'
		]);
		$menu['system']->addChild('rabc_role_add', [
		    'route' => 'kit_rbac_role_add',
		    'label' => '新增用户组'
		]);
		
		$menu->addChild('news', array(
		    'route' => 'kit_news_list',
		    'label' => '文章',
		    'attributes' =>[
		        'icon' => 'icon-tasks'
		    ]
		));
		$menu['news']->addChild('news_list', [
		    'route' => 'kit_news_list',
		    'label' => '文章列表'
		]);
		$menu['news']->addChild('news_add', [
			'route' => 'kit_news_add',
			'label' => '新增文章'
		]);
		$menu['news']->addChild('category_list', [
		    'route' => 'kit_news_category',
		    'label' => '分类列表'
		]);
		$menu['news']->addChild('category_add', [
		    'route' => 'kit_news_category_add',
		    'label' => '新增分类'
		]);
		return $menu;
	}

}