<?php
namespace KitDnspodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('KitDnspodBundle:Default:index.html.twig');
    }

    public function testAction()
    {
        $config = [
            'base_uri' => 'https://dnsapi.cn/',
            'timeout' => 5, // 超时时间
        ];
        $baseParam = [
            'form_params' => [
                'login_token' => '25805,lcp0578befb083369136cd2a05bb05a7e9c2087', //用于鉴权的 API Token
                'format' => 'json', // {json,xml} 返回的数据格式，可选，默认为xml，建议用json
                'lang' => 'cn', // {en,cn} 返回的错误语言，可选，默认为en，建议用cn
                'error_on_empty' => 'yes', // {yes,no} 没有数据时是否返回错误，可选，默认为yes，建议用no
            ],
            'headers' => [
                'User-Agent' => 'KIT DNSPOD Client/1.0.0 (lcp0578@gmail.com)'
            ]
        ];
        /**
         *
         * @var $guzzleHttp \KitBaseBundle\Service\GuzzleHttp
         */
        $guzzleHttp = $this->get('kit.guzzle_http');
        $client = $guzzleHttp->getClient($config);
        try {
            /**
             *
             * @var $response \GuzzleHttp\Psr7\Response
             */
            $response = $client->request('POST', 'Info.Version', $baseParam);
            $result['code'] = $response->getStatusCode();
            if(200 == $result['code']){
                $result['data'] = json_decode($response->getBody()->getContents(), true);
            }
        } catch (\GuzzleHttp\Exception\TransferException $e) {
            $result['code'] = 0;
            $result['msg'] = '网络异常,请刷新';
            $result['data'] = [
                'e_code' => $e->getCode(),
                'e_msg' => $e->getMessage()
            ];
        }
        return new JsonResponse();
    }
}
