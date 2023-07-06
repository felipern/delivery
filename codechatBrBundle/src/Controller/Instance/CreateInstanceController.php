<?php

namespace CodechatBrBundle\Controller\Instance;

use CodechatBrBundle\Entity\Instance;
use CodechatBrBundle\Repository\InstanceRepository;
use CodechatBrBundle\Type\InstanceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CreateInstanceController extends AbstractController
{
    #[Route('/instance/create', name: 'codechat_br_instance_create')]
    public function create(
        Request $request,
        InstanceRepository $instanceRepository
    ) {
        $instance = new Instance();
        $form = $this->createForm(InstanceType::class, $instance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $instanceRepository->add($instance);
            return $this->redirectToRoute('codechat_br_instance_list');
        }

        return $this->render('@CodechatBr/instance/new.html.twig', [
            'form' => $form->createView()
        ]);
        
    }
}