<?php
namespace KitDnspodBundle\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
class DomainController extends BaseController
{

    public function indexAction()
    {
        return $this->render('KitDnspodBundle:Domain:index.html.twig');
    }
    
    public function listAction($page, Request $request)
    {
        $groupId = $request->query->get('group_id', null);
        if($page < 1) $page = 1;
        $pagesize = 10;
        $param = [];
        if(!is_null($groupId)){
            $param['group_id'] = $groupId; 
        }
        $result = $this->request('Domain.List', $param);
        if(200 == $result['code'] && isset($result['data']['domains'])){
            $list = $result['data']['domains'];
        }else{
            return new JsonResponse('网络异常，请刷新');
        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $list,
            $page,
            $pagesize
        );
        return $this->render('KitDnspodBundle:Domain:index.html.twig', [
            'pagination' => $pagination
        ]);
    }
    
    public function groupAction($page)
    {
        if($page < 1) $page = 1;
        $pagesize = 10;
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
    }
}