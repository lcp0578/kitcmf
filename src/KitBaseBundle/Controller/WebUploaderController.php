<?php

namespace KitBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class WebUploaderController extends Controller
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
        $file = $request->files->get('file');
        if($file instanceof UploadedFile){
            $filename = $this->get('kit.file_uploader')->upload($file, 'file');
            $jsonRpc['result'] = [
                'filename' => '/uploads'. $filename
            ];
        }else{
            $jsonRpc['error'] = [
                'code' => 200,
                'message' => '图片上传失败'
            ];
        }
        return new JsonResponse($jsonRpc);
    }
}