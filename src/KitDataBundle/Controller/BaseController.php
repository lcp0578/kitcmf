<?php
namespace KitDataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuzzleHttp\Exception\ClientException;

class BaseController extends Controller
{

    /**
     * get guzzle http client
     *
     * @return \GuzzleHttp\Client
     */
    protected function getClient()
    {
        return $this->get('guzzle.client.api_110');
    }

    /**
     * get access token
     * 
     * @return string|boolean
     */
    protected function getAccessToken()
    {
        $client = $this->getClient();
        try {
            $response = $client->post('/user', [
                'form_params' => [
                    'client_id' => 5500,
                ]
            ]);
            $code = $response->getStatusCode();
            dump($code);
            // "200"
            $contentType = $response->getHeader('content-type');
            // 'application/json; charset=utf8'
            $content = $response->getBody()->getContents();
            $result = json_decode($content, true);
            dump($result);
            if (200 == $code && isset($result['access_token']) && ! empty($result['access_token'])) {
                return $result['access_token'];
            }
        } catch (ClientException $e) {
//             dump($e->getRequest());
//             dump($e->getResponse());
        }
        return false;
    }
}
