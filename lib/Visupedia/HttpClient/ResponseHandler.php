<?php

namespace Visupedia\HttpClient;

use Guzzle\Http\Message\Response as GuzzleResponse;

/**
 * ResponseHandler takes care of decoding the response body into suitable type
 */
class ResponseHandler {

    public static function getBody(GuzzleResponse $response)
    {
        $body = $response->getBody(true);

        return $body;
    }

}
