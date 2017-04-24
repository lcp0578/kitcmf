<?php
namespace KitDnspodBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RecordController extends BaseController
{

    public function indexAction($page, Request $request)
    {
        $domainId = $request->query->get('domain_id', null);
        if($page < 1) $page = 1;
        $pagesize = 10;
        $param = [];
        if(is_numeric($domainId)){
            $param['domain_id'] = $domainId;
        }else{
            return new JsonResponse('参数错误');
        }
        $result = $this->request('Record.List', $param);
        dump($result);
        if(200 == $result['code'] && isset($result['data']['records']) && isset($result['data']['domain'])){
            $list = $result['data']['records'];
            $domain = $result['data']['domain'];
        }else{
            return new JsonResponse('网络异常，请刷新');
        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $list,
            $page,
            $pagesize
        );
        return $this->render('KitDnspodBundle:Record:index.html.twig', [
            'pagination' => $pagination,
            'domain' => $domain
        ]);
    }

    public function listAction()
    {
        $result = $this->request('Record.List', [
            'domain_id' => 37951496
        ]);
        
        echo '<pre>';
        print_r($result);
        return new JsonResponse($result);
    }

    /**
     */
    protected function check($subDomain)
    {
        $result = $this->request('Record.List', [
            'domain' => '17kxgame.com'
        ]);
        
        if (isset($result['data']['status']['code']) && 1 == $result['data']['status']['code']) {
            $records = array_column($result['data']['records'], 'name', 'id');
            return array_search($subDomain, $records);
        }
        return false;
    }

    /**
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {
        @set_time_limit(0);
        header("Content-type: text/html; charset=utf-8");
        foreach ($this->getRows('record.log') as $row) {
            $rowInfo = preg_split('/\s+/', $row);
            echo '<pre>';
            $subDomain = str_replace('.17kxgame.com', '', $rowInfo[0]);
            var_dump($subDomain);
            if (false === $id = $this->check($subDomain)) {
                $result = $this->request('Record.Create', [
                    'domain' => '17kxgame.com',
                    'sub_domain' => $subDomain,
                    'record_type' => 'A', // or CNAME
                    'record_line' => '默认', // 电信
                    'value' => $rowInfo[1]
                ]);
                var_dump($result);
            } else {
                var_dump($id);
            }
            var_dump($id);
            print_r($rowInfo);
            // $result = $this->request('Record.Create', [
            // 'domain_id' => 37951496,
            // 'sub_domain' => $rowInfo[0],
            // 'record_type' => 'A',
            // 'record_line' => '默认', // 电信
            // 'value' => $rowInfo[1]
            // ]);
            // var_dump($result);
            // dump($result);
            // if(isset($rowInfo[2]) && !empty($rowInfo[2])){
            // $result = $this->request('Record.Create', [
            // 'domain_id' => 37951496,
            // 'sub_domain' => $rowInfo[0],
            // 'record_type' => 'A',
            // 'record_line' => '联通', // 电信
            // 'value' => $rowInfo[2]
            // ]);
            // var_dump($result);
            // dump($result);
            // }
        }
        return new Response();
    }
    /**
     * 添加域名解析
     */
    public function addAction(Request $request)
    {
        $errors = [];
        $em = $this->getDoctrine()->getEntityManager();
        
        $form = $this->createFormBuilder()
            ->add('domain', null, ['label' => '域名'])
            ->add('list', TextareaType::class, ['label' => '列表'])
            ->add('submit', SubmitType::class, ['label' => '提交'])
            ->getForm();
        
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                /**
                 */
                $formData = $form->getData();
                if(isset($formData['domain']) && isset($formData['list']) && !empty($formData['domain']) && !empty($formData['list'])){
                    //dump($formData);
                    //dump($formData['domain']);
                    //dump($formData['list']);
                    $rowArr = preg_split('/\r\n/', $formData['list']);
                    foreach ($rowArr as $row){
                        $rowInfo = preg_split('/\s+/', $row);
                        //dump($rowInfo);
                        $subDomain = str_replace('.17kxgame.com', '', $rowInfo[0]);
                        var_dump($subDomain);
                        if (false === $id = $this->check($subDomain)) {
                            $result = $this->request('Record.Create', [
                                'domain' => '17kxgame.com',
                                'sub_domain' => $subDomain,
                                'record_type' => 'A', // or CNAME
                                'record_line' => '默认', // 电信
                                'value' => $rowInfo[1]
                            ]);
                            var_dump($result);
                        } else {
                            var_dump($id);
                        }
                    }
                }else{
                    
                }
                
                //return $this->msgResponse(0, '恭喜', '添加成功', 'kit_dnspod_record');
            }else{
                $errors = $this->serializeFormErrors($form);
            }
        }
        return $this->render('KitDnspodBundle:Record:add.html.twig', [
            'form' => $form->createView(),
            'errors' => $errors
        ]);
    }
}
