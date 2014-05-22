<?php

namespace Visupedia\HttpClient;

use Guzzle\Common\Event;
use Guzzle\Http\Message\Response;

use Visupedia\HttpClient\ResponseHandler;
use Visupedia\Exception\ClientException;

/**
 * ErrorHanlder takes care of selecting the error message from response body
 */
class ErrorHandler
{
    public function onRequestError(Event $event)
    {
        $request = $event['request'];
        $response = $request->getResponse();

        $message = null;
        $code = $response->getStatusCode();

        if ($response->isServerError()) {
            throw new ClientException('Error '.$code, $code);
        }

        if ($response->isClientError()) {
            $body = ResponseHandler::getBody($response);

            // If HTML, whole body is taken
            if (gettype($body) == 'string') {
                $message = $body;
            }

            if (empty($message)) {
                $message = 'Unable to understand the content type of response returned by request responsible for error';
            }

            throw new ClientException($message, $code);
        }
    }
}
