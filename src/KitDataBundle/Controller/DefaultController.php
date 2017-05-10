<?php

namespace KitDataBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use GuzzleHttp\Exception\ClientException;

class DefaultController extends Base110Controller
{
    public function indexAction()
    {
        /** 
         * @var $client \GuzzleHttp\Client $client 
         **/
        $client   = $this->get('guzzle.client.api_user');
        $response = $client->get('/user.php');
        $code = $response->getStatusCode();
        // "200"
        $contentType =  $response->getHeader('content-type');
        // 'application/json; charset=utf8'
        $content = $response->getBody()->getContents();
        return new JsonResponse(json_decode($content, true));
    }
    /**
     * 
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function oauthAction()
    {
        /**
         * @var $client \GuzzleHttp\Client $client
         **/
        $client   = $this->get('guzzle.client.api_110');
        $response = $client->post('/user', [
            'form_params' => [
                'client_id' => 5500,
            ]
        ]);
        $code = $response->getStatusCode();
        // "200"
        $contentType =  $response->getHeader('content-type');
        // 'application/json; charset=utf8'
        $content = $response->getBody()->getContents();
        dump($content);
        return new JsonResponse(json_decode($content, true));
    }
    /**
     * get receive data
     * 
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function receiveAction()
    {
        // /oamservice/api/service/973535/5.0
        $client = $this->getClient();
        $accessToken = $this->getAccessToken();
        if(false === $accessToken) return 'get access token faild';
        dump($accessToken);
        try {
            $response = $client->get('/o', [
                'query' => [
                    'access_token' => $accessToken,
                ]
            ]);
            $code = $response->getStatusCode();
//             dump($code);
            // "200"
            $contentType =  $response->getHeader('content-type');
            // 'application/json; charset=utf8'
            $content = $response->getBody()->getContents();
            $result = json_decode($content, true);
//             echo '<pre>';
//             print_r($result);
            //print_r(is_null($result['result']['data'][0]['BJCPH']));
//             return new JsonResponse(['test' => 111]);
            return json_encode(['test' => 111]);
        }catch(ClientException $e){
            dump($e->getRequest());
            dump($e->getResponse());
            return new JsonResponse([
                'exception'
            ]);
        }
        
    }
    
}
