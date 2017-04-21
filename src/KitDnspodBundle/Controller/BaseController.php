<?php
namespace KitDnspodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

class BaseController extends Controller
{

    protected function request($uri, array $option = [], $method = 'POST')
    {
        $formParams = [
            'login_token' => '29592,ca5feee0c2dcfcd417cfc3b0196a21e5', // 用于鉴权的 API Token
            'format' => 'json', // {json,xml} 返回的数据格式，可选，默认为xml，建议用json
            'lang' => 'cn', // {en,cn} 返回的错误语言，可选，默认为en，建议用cn
            'error_on_empty' => 'yes'
        ] // {yes,no} 没有数据时是否返回错误，可选，默认为yes，建议用no
;
        $formParams = array_merge($formParams, $option);
        /**
         *
         * @var $guzzleHttp \KitBaseBundle\Service\GuzzleHttp
         */
        $guzzleHttp = $this->get('kit.guzzle_http');
        $client = $guzzleHttp->getClient([
            'base_uri' => 'https://dnsapi.cn/',
            'timeout' => 5
        ] // 超时时间
);
        $result = [
            'code' => - 1,
            'msg' => '系统错误',
            'data' => []
        ];
        try {
            /**
             *
             * @var $response \GuzzleHttp\Psr7\Response
             */
            $response = $client->request($method, $uri, [
                'headers' => [
                    'User-Agent' => 'KIT DNSPOD Client/1.0.0 (lcp0578@gmail.com)'
                ],
                'form_params' => $formParams
            ]);
            $result['code'] = $response->getStatusCode();
            if (200 == $result['code']) {
                $result['msg'] = '获取成功';
                $result['data'] = json_decode($response->getBody()->getContents(), true);
            }else{
                $result['msg'] = '请求异常';
            }
        } catch (\GuzzleHttp\Exception\TransferException $e) {
            $result['code'] = 0;
            $result['msg'] = '网络异常,请刷新';
            $result['data'] = [
                'e_code' => $e->getCode(),
                'e_msg' => $e->getMessage()
            ];
        }
        return $result;
    }
    
    protected function getRows($file) {
        $handle = fopen($file, 'rb');
        if ($handle === false) {
            throw new FileNotFoundException($file);
        }
        while (feof($handle) === false) {
            yield fgets($handle);
        }
        fclose($handle);
    }
}
