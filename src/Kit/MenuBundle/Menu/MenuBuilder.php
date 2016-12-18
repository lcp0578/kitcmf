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

        $menu->addChild('管理员列表', array(
            'route' => 'kit_admin_list'
        ));
        $menu->addChild('新增管理员', array(
            'route' => 'kit_admin_add'
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