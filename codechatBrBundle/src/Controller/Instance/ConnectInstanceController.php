<?php

namespace CodechatBrBundle\Controller\Instance;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use CodechatBr\CodechatBr;

class ConnectInstanceController extends AbstractController
{
    #[Route('/codechat_br/instance/qr', name: 'codechat_br_instance_qr')]
    public function qr()
    {
        $options = [
            'url' => 'http://whatsappapi:8083/',
            'apikey' => 'F61C09855DACF7950FF96FC5D98C1929',
        ];

        $apiClient = CodechatBr::getInstance($options);

        $response = $apiClient->connectionStateInstance(['instanceName' => '123']);
            
        if (!$response) {
            $response = $apiClient->createInstance(null, ['instanceName' => '123']);
        }
    
        $response = $apiClient->connectInstance(['instanceName' => '123'], null);    

        return new Response('<html> <body><img src="' . $response['base64'] . '"> </body></html>');
    }
}