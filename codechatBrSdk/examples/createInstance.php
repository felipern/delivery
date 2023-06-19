<?php

if (file_exists($autoload = realpath(__DIR__ . "/../vendor/autoload.php"))) {
	require_once $autoload;
} else {
	print_r("Autoload not found or on path <code>$autoload</code>");
}

if (file_exists($options = realpath(__DIR__ . "/options.php"))) {
	require_once $options;
}

use CodechatBr\CodechatBr;

try {
    $apiClient = CodechatBr::getInstance($options);
    $response = $apiClient->connectionStateInstance(['instanceName' => '123']);
    
    // var_dump($response);

    if (!$response) {
        $response = $apiClient->createInstance(null, ['instanceName' => '123']);
    }

    // 
    // print_r("<pre>" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</pre>");

    $response = $apiClient->connectInstance(['instanceName' => '123'], null);
    
    // print_r("<pre>" . json_decode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</pre>");
    var_dump($response['code']);
} catch (\Exception $exception) {
    echo $exception->getMessage();
}
