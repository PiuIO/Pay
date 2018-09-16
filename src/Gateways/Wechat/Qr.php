<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-01
 */

namespace PiuIO\Pay\Gateways\Wechat;

use PiuIO\Pay\Requests\Charge;

class Qr extends AbstractWechatGateway
{
    /**
     * @param Charge $form
     *
     * @return array
     */
    protected function prepareCharge(Charge $form): array
    {
        return [];
    }

    protected function doCharge(array $response, Charge $form): array
    {
        return [
            'charge_url' => $response['code_url'],
            'parameters' => [
                'prepay_id' => $response['prepay_id'],
            ],
        ];
    }

    protected function getTradeType(): string
    {
        return 'NATIVE';
    }
}
