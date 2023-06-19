<?php

/**
 * Class CodechatBr
 * @package CodechatBrSdk
 * 
 * API
 * @method array createInstance(array $params = [], array $body)
 */

namespace CodechatBr;

class CodechatBr extends Endpoints
{
    public function __construct($options, $requester = null, $endpointsConfigFile = null)
    {
        if ($endpointsConfigFile) {
            Config::setEndpointsConfigFile($endpointsConfigFile);
        } 

        parent::__construct($options, $requester);
    }
}