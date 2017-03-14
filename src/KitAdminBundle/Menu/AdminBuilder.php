<?php
/**
 * Author: lcp0578@gmail.com
 * 
 * Date: 2017/01/22
 * Time: 18:26
 */
namespace KitAdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AdminBuilder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function setContainer(ContainerInterface $container = null)
    {}

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root', [
            'label' => '主菜单'
        ]);
        
        $menu->addChild('kit_admin_homepage', [
            'route' => 'kit_admin_homepage',
            'label' => '首页',
            'attributes' => [
                'icon' => 'icon-home'
            ]
        ]);
        $menu['kit_admin_homepage']->addChild('kit_admin_homepage', [
            'route' => 'kit_admin_homepage',
            'label' => '欢迎页'
        ]);
        // access services from the container!
        // $em = $this->container->get('doctrine')->getManager();
        // findMostRecent and Blog are just imaginary examples
        // $blog = $em->getRepository('KitAdminBundle:Admin')->findMostRecent();
        
        $menu->addChild('kit_rbac_user', array(
            'route' => 'kit_rbac_user',
            'label' => '系统',
            'attributes' => [
                'icon' => 'icon-cog'
            ]
        ))
        // 'routeParameters' => array('id' => $blog->getId())
        ;
        $menu['kit_rbac_user']->addChild('kit_rbac_user', [
            'route' => 'kit_rbac_user',
            'label' => '管理员列表'
        ]);
        $menu['kit_rbac_user']->addChild('kit_rbac_user_add', [
            'route' => 'kit_rbac_user_add',
            'label' => '新增管理员'
        ]);
        $menu['kit_rbac_user']->addChild('kit_rbac_role', [
            'route' => 'kit_rbac_role',
            'label' => '用户组列表'
        ]);
        $menu['kit_rbac_user']->addChild('kit_rbac_role_add', [
            'route' => 'kit_rbac_role_add',
            'label' => '新增用户组'
        ]);
        
        $menu->addChild('kit_news_list', array(
            'route' => 'kit_news_list',
            'label' => '文章',
            'attributes' => [
                'icon' => 'icon-tasks'
            ]
        ));
        $menu['kit_news_list']->addChild('kit_news_list', [
            'route' => 'kit_news_list',
            'label' => '文章列表'
        ]);
        $menu['kit_news_list']->addChild('kit_news_add', [
            'route' => 'kit_news_add',
            'label' => '新增文章'
        ]);
        $menu['kit_news_list']->addChild('kit_news_category', [
            'route' => 'kit_news_category',
            'label' => '分类列表'
        ]);
        $menu['kit_news_list']->addChild('kit_news_category_add', [
            'route' => 'kit_news_category_add',
            'label' => '新增分类'
        ]);
        $menu['kit_news_list']->addChild('kit_news_category_update', [
            'route' => 'kit_news_category_update',
            'label' => '更新分类',
            'attributes' => [
                'show' => 'off'
            ]
        ]);
        
        return $menu;
    }
}