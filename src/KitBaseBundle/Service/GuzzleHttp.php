<?php
namespace KitBaseBundle\Service;

use GuzzleHttp\Client;

class GuzzleHttp
{

    /**
     * get client
     *
     * @return \GuzzleHttp\Client
     */
    public function getClient(array $config)
    {
        return new Client($config);
    }
}