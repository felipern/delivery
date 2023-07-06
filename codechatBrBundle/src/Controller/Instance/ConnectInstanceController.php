<?php

namespace CodechatBrBundle\Controller\Instance;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use CodechatBr\CodechatBr;
use CodechatBrBundle\Repository\InstanceRepository;
use Symfony\Component\Uid\Uuid;

class ConnectInstanceController extends AbstractController
{
    #[Route('/instance/{uuid}/connect', name: 'codechat_br_instance_connect')]
    public function qr(
        Uuid $uuid,
        InstanceRepository $instanceRepository,
    ) {
        $instance = $instanceRepository->findOneBy([
            'uuid' => $uuid
        ]);
        
        $options = [
            'url' => 'http://whatsappapi:8083/',
            'apikey' => 'F61C09855DACF7950FF96FC5D98C1929',
        ];

        $apiClient = CodechatBr::getInstance($options);

        $response = $apiClient->connectionStateInstance(['instanceName' => $instance->getUuid()]);
        
        if (!$response) {
            $response = $apiClient->createInstance(null, ['instanceName' => $instance->getUuid()]);
        }
    
        
        
        if($response) {

        }

        $response = $apiClient->connectInstance(['instanceName' => $instance->getUuid()], null);    
        dump($response);
        return $this->render('@CodechatBr/instance/connect.html.twig', [
            'image' => $response['base64']
        ]);
    }
}