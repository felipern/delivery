<?php

namespace CodechatBrBundle\Controller\Instance;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use CodechatBr\CodechatBr;

class CreateInstanceController extends AbstractController
{
    #[Route('/codechat_br/instance/create', name: 'codechat_br_instance_qr')]
    public function create()
    {
        
    }
}