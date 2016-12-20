<?php
/**
 * Created by PhpStorm.
 * User: 27981
 * Date: 2016/11/13
 * Time: 20:33
 */

namespace Kit\MenuBundle\Menu;
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class AdminBuilder implements ContainerAwareInterface
{
	use ContainerAwareTrait;

	public function mainMenu(FactoryInterface $factory, array $options)
	{
		$menu = $factory->createItem('root',array('label'=>'控制面板'));

		$menu->addChild('首页', array('route' => 'homepage'));

		// access services from the container!
		//$em = $this->container->get('doctrine')->getManager();
		// findMostRecent and Blog are just imaginary examples
		//$blog = $em->getRepository('KitAdminBundle:Admin')->findMostRecent();

		$menu->addChild('接警登记', array(
			'route' => 'kit_case_register'
		));
		$menu->addChild('接警处置反馈', array(
			'route' => 'kit_case_feedback'
			//'routeParameters' => array('id' => $blog->getId())
		));
		$menu->addChild('警情记录', array(
			'route' => 'kit_case_record'
			//'routeParameters' => array('id' => $blog->getId())
		));
		$menu->addChild('警务监督', array(
			'route' => 'kit_monitor_homepage'
			//'routeParameters' => array('id' => $blog->getId())
		));
		$menu->addChild('超期预警', array(
			'route' => 'kit_warning_homepage'
			//'routeParameters' => array('id' => $blog->getId())
		));
		$menu->addChild('数据分析', array(
			'route' => 'kit_analysis_homepage'
			//'routeParameters' => array('id' => $blog->getId())
		));
		$menu->addChild('案件查询', array(
			'route' => 'kit_inquire_homepage'
			//'routeParameters' => array('id' => $blog->getId())
		));
		$menu->addChild('文档管理', array(
			'route' => 'kit_archive_homepage'
			//'routeParameters' => array('id' => $blog->getId())
		));
		$menu->addChild('设置', array(
			'route' => 'kit_settings_homepage'
			//'routeParameters' => array('id' => $blog->getId())
		));
		return $menu;
	}

}