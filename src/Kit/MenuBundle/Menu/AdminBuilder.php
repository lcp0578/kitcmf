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

		// access services from the container!
		//$em = $this->container->get('doctrine')->getManager();
		// findMostRecent and Blog are just imaginary examples
		//$blog = $em->getRepository('KitAdminBundle:Admin')->findMostRecent();

		$menu->addChild('system', array(
			'route' => 'kit_rbac_homepage',
		    'label' => '系统',
		    'attributes' =>[
		        'icon' => 'icon-cog'
		    ]
			//'routeParameters' => array('id' => $blog->getId())
		));
		return $menu;
	}

}