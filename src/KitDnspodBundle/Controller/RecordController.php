<?php
namespace KitDnspodBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RecordController extends BaseController
{

    public function indexAction()
    {
        return $this->render('KitDnspodBundle:Default:index.html.twig');
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
            'domain' => '2131.com'
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
            $subDomain = str_replace('.2131.com', '', $rowInfo[0]);
            var_dump($subDomain);
            if (false === $id = $this->check($subDomain)) {
                $result = $this->request('Record.Create', [
                    'domain' => '2131.com',
                    'sub_domain' => $subDomain,
                    'record_type' => 'CNAME',
                    'record_line' => '默认', // 电信
                    'value' => $rowInfo[2]
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
}
