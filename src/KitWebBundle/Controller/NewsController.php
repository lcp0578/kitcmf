<?php
namespace KitWebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class NewsController extends Controller
{

    public function indexAction()
    {
        //$dataUri = $this->generateUrl('kit_web_news_data');
        return $this->render('KitWebBundle:News:index.html.twig', [
            //'data_uri' => $dataUri
        ]);
    }

    public function listAction()
    {
        //$dataUri = $this->generateUrl('kit_web_news_data');
        return $this->render('KitWebBundle:News:list.html.twig', [
            //'data_uri' => $dataUri
        ]);
    }
    
    public function jscrollAction()
    {
        //$dataUri = $this->generateUrl('kit_web_news_data');
        return $this->render('KitWebBundle:News:jscroll.html.twig', [
            //'data_uri' => $dataUri
        ]);
    }
    
    public function showAction($uuid)
    {
        return $this->render('KitWebBundle:News:show.html.twig');
    }

    public function dataAction(Request $request)
    {
        $page = $request->get('page', 2);
        $json = [
            'total' => 20,
            'result' => [
                [
                    "image" => "http://wlog.cn/demo/waterfall/images/001.jpg",
                    "width" => 192,
                    "height" => 288
                ],
                [
                    "image" => "http://wlog.cn/demo/waterfall/images/001.jpg",
                    "width" => 192,
                    "height" => 288
                ],
                [
                    "image" => "http://wlog.cn/demo/waterfall/images/001.jpg",
                    "width" => 192,
                    "height" => 288
                ],
                [
                    "image" => "http://wlog.cn/demo/waterfall/images/001.jpg",
                    "width" => 192,
                    "height" => 288
                ],
                [
                    "image" => "http://wlog.cn/demo/waterfall/images/001.jpg",
                    "width" => 192,
                    "height" => 288
                ],
                [
                    "image" => "http://wlog.cn/demo/waterfall/images/001.jpg",
                    "width" => 192,
                    "height" => 288
                ],
                [
                    "image" => "http://wlog.cn/demo/waterfall/images/001.jpg",
                    "width" => 192,
                    "height" => 288
                ]
            ]
        ];
        
        return new JsonResponse($json);
    }
}