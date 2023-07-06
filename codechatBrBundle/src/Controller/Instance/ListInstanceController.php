<?php

namespace CodechatBrBundle\Controller\Instance;

use CodechatBrBundle\Repository\InstanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListInstanceController extends AbstractController
{
    #[Route('/instance/list', name: 'codechat_br_instance_list')]
    public function create(InstanceRepository $instanceRepository)
    {
        $instances = $instanceRepository->findAll();
        
        return $this->render('@CodechatBr/instance/list.html.twig', [
            'instances' => $instances,
        ]);
    }
}