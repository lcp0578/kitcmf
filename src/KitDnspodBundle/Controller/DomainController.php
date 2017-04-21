<?php
namespace KitDnspodBundle\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
class DomainController extends BaseController
{

    public function indexAction()
    {
        return $this->render('KitDnspodBundle:Domain:index.html.twig');
    }
    
    public function listAction()
    {
        $result = $this->request('Domain.List');
        // 17kxgame 37951496
        return new JsonResponse($result);
    }
    
    public function groupAction($page)
    {
        if($page < 1) $page = 1;
        $pagesize = 3;
        $result = $this->request('Domaingroup.List');
        if(200 == $result['code'] && isset($result['data']['groups'])){
            $list = $result['data']['groups'];
        }else{
            return new JsonResponse('网络异常，请刷新');
        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $list,
            $page,
            $pagesize
        );
        return $this->render('KitDnspodBundle:Domain:group.html.twig', [
            'pagination' => $pagination
        ]);
        // 17kxgame 37951496
        return new JsonResponse($result);
    }
}