<?php
namespace Kit\MenuBundle\Menu;

use Knp\Menu\FactoryInterface;

class MenuBuilder
{
    private $factory;
    
    /**
     * @param FactoryInterface $factory
     *
     * Add any other dependency you need
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }
    /**
     * create main menu
     * 
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

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
        // create another menu item
        //$menu->addChild('About Me', array('route' => 'about'));
        // you can also add sub level's to your menu's as follows
        //$menu['About Me']->addChild('Edit profile', array('route' => 'edit_profile'));

        // ... add more children

        return $menu;
    }
    /**
     * create sidebar menu
     * 
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function createSidebarMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        
        $menu->addChild('侧边栏', array('route' => 'sidebar'));
        return $menu;
    }
}