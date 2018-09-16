<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-01
 */

namespace PiuIO\Pay\Gateways\Alipay;

class Qr extends AbstractAlipayGateway
{
    protected function getChargeMethod(): string
    {
        return 'alipay.trade.precreate';
    }

    protected function doCharge(array $payload): array
    {
        $response = $this->request($payload);

        return [
            'charge_url' => $response['qr_code'],
        ];
    }
}
