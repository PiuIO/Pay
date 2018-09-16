<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-01
 */

namespace PiuIO\Pay\Gateways\Wechat;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use PiuIO\Pay\Exception\RequestGatewayException;
use PiuIO\Pay\Exception\WechatOpenIdException;
use PiuIO\Pay\Requests\Charge;
use PiuIO\Pay\Utils\HttpClient;

class Official extends AbstractWechatGateway
{
    const JSAPI_AUTH_URL = 'https://api.weixin.qq.com/sns/oauth2/access_token';

    /**
     * @param Charge $form
     *
     * @return array
     */
    protected function prepareCharge(Charge $form): array
    {
        $openId = $form->has('extras.open_id')
            ? $form->get('extras.open_id')
            : $this->getOpenId($form->get('extras.code'));

        return [
            'openid' => $openId,
        ];
    }

    protected function doCharge(array $response, Charge $form): array
    {
        $parameters = [
            'appId'     => $this->config->get('app_id'),
            'timeStamp' => time(),
            'nonceStr'  => uniqid(),
            'package'   => "prepay_id={$response['prepay_id']}",
            'signType'  => 'MD5',
        ];

        $parameters['paySign'] = $this->sign($parameters);

        return [
            'charge_url' => '',
            'parameters' => $parameters,
        ];
    }

    protected function getTradeType(): string
    {
        return 'JSAPI';
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
            static::JSAPI_AUTH_URL,
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
