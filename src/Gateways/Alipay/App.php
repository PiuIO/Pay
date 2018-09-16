<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-03
 */

namespace PiuIO\Pay\Gateways\Alipay;

use PiuIO\Pay\Requests\Charge;

class App extends AbstractAlipayGateway
{
    /**
     * @return string
     */
    protected function getChargeMethod(): string
    {
        return 'alipay.trade.app.pay';
    }

    protected function prepareCharge(Charge $form): array
    {
        return [
            'product_code' => 'QUICK_MSECURITY_PAY',
        ];
    }

    protected function doCharge(array $payload): array
    {
        return [
            'charge_url' => '',
            'parameters' => [
                'string' => http_build_query($payload),
            ],
        ];
    }
}
