<?php
namespace KitWebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use KitWebBundle\Form\WebUserType;
use KitWebBundle\Entity\WebUser;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{

    public function indexAction(Request $request)
    {
        $type = $request->query->get('versionType', 'default version type');
        $version = $request->query->get('curVersion', 'current version');
        file_put_contents('version.log', '['.date('Y-m-d H:i:s').']' . $type .'|'. $version, FILE_APPEND);
        $desVersion = '3.0.0.0';
        $versions = [
            '2.9.8.0_qh0' => '3.0.0.1',
            '2.9.8.0_wo0' => '3.0.0.1',
            '2.9.0.0_bcs6' => '3.0.0.1'
        ];
        if(array_key_exists($version, $versions)){
            $desVersion = $versions[$version];
        }
        return new Response('gamebox|' . $desVersion);
    }
    
    public function downloadAction(Request $request)
    {
        $type = $request->query->get('versionType', 'default version type');
        $version = $request->query->get('curVersion', 'current version');
        $desVersion = '3.0.0.0';
        $versions = [
            '2.9.8.0_wo0' => '3.0.0.1',
            '2.9.0.0_bcs6' => '3.0.0.1'
        ];
        if(array_key_exists($version, $versions)){
            $desVersion = $versions[$version];
        }
        return new Response('gamebox|' . $desVersion);
    }
}