<?php

namespace PiuIO\Pay\Gateways\WechatOversea;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use PiuIO\Pay\Exception\RequestGatewayException;
use PiuIO\Pay\Exception\WechatOpenIdException;
use PiuIO\Pay\Requests\Charge;
use PiuIO\Pay\Utils\HttpClient;

class Official extends AbstractWechatOverseaGateway
{
    public function prepareCharge(Charge $form): array
    {
        $openId = $form->has('extras.open_id')
            ? $form->get('extras.open_id')
            : $this->getOpenId($form->get('extras.code'));

        return [
            'sub_openid' => $openId,
            'is_raw'     => 1,
        ];
    }

    public function doCharge(array $response, Charge $form): array
    {
        return [
            'charge_url' => '',
            'parameters' => json_decode($response['pay_info'], true),
        ];
    }

    protected function getOpenId($code): string
    {
        $parameters = [
            'appid'      => $this->config->get('app_id'),
            'secret'     => $this->config->get('app_secret'),
            'code'       => $code,
            'grant_type' => 'authorization_code',
        ];

        return HttpClient::request(
            'GET',
            static::MP_JSAPI_AUTH_URL,
            [
                RequestOptions::QUERY => $parameters,
            ],
            function (ResponseInterface $response) {
                $result = json_decode($response->getBody(), true);

                if (isset($result['errcode'])) {
                    throw new WechatOpenIdException($result['errmsg']);
                }

                return $result['openid'];
            },
            function (RequestException $exception) {
                throw new RequestGatewayException('Wechat Gateway Error', $exception);
            }
        );
    }
}
