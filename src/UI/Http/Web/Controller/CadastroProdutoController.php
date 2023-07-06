<?php

declare(strict_types=1);

namespace UI\Http\Web\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CadastroProdutoController extends AbstractController
{
    #[Route('/', name: 'produto-cadastrar', methods: ['GET'])]
    public function get(HttpClientInterface $httpClient): Response
    {
        // $curlh = curl_init('localhost:8083/instance/connect/codechat');
        // $ch = curl_init();

        // // set URL and other appropriate options
        // curl_setopt($ch, CURLOPT_URL, 'whatsappapi:8083/instance/connect/codechat');
        // curl_setopt($ch, CURLOPT_HEADER, 1);
        // curl_setopt($ch, CURLOPT_HEADER, 1);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, [
        //     'apikey' => 't8OOEeISKzpmc3jjcMqBWYSaJsafdefer'
        // ]);

        // $response = $httpClient->request('POST', 'http://whatsappapi:8083/instance/create', [
        //     'headers' => [
        //         'apikey' => 't8OOEeISKzpmc3jjcMqBWYSaJsafdefer',
        //         'Content-Type' => 'application/json',
        //     ],
        //     'body' => json_encode([
        //         'instanceName' => 'codechat',
        //     ]),
        // ]);

        $response = $httpClient->request('GET', 'http://whatsappapi:8083/instance/connect/codechat', [
            'headers' => [
                'apikey' => 't8OOEeISKzpmc3jjcMqBWYSaJsafdefer',
                'Accept' => 'application/json',
            ]
        ]);

        dump($response->getContent());

        // grab URL and pass it to the browser
        $img = json_decode($response->getContent())->base64;

        
        return $this->render('produto/cadastrar.html.twig', ['img' => $img]);
    }
}