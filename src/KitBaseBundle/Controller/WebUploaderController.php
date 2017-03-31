<?php

namespace KitBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class WebUploader extends Controller
{
    /**
     * @Route("/webuploader", name="webuploader")
     */
    public function indexAction(Request $request)
    {
        $jsonRpc = [
            'jsonrpc' => '2.0',
            'result' => null,
            'error' => null,
            'id' => time()
        ];
        $files = $request->files;
        return new JsonResponse();
    }
}