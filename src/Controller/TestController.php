<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/')]
    public function index()
    {
        $curlh = curl_init('localhost:8083/instance/connect/codechat');
        dd(curl_exec($curlh));

    }
}