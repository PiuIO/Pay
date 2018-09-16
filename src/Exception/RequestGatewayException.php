<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-05
 */

namespace PiuIO\Pay\Exception;

use GuzzleHttp\Exception\RequestException;
use RuntimeException;

class RequestGatewayException extends RuntimeException
{
    protected $responseRaw;

    public function __construct($message, RequestException $exception)
    {
        if (!is_null($exception->getResponse())) {
            $this->responseRaw = (string) $exception->getResponse()->getBody();
        }

        parent::__construct($message, 0, $exception);
    }
}
