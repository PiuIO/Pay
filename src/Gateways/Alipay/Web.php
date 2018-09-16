<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-01
 */

namespace PiuIO\Pay\Gateways\Alipay;

use PiuIO\Pay\Requests\Charge;

class Web extends AbstractAlipayGateway
{
    protected function getChargeMethod(): string
    {
        return 'alipay.trade.page.pay';
    }

    protected function prepareCharge(Charge $form): array
    {
        return [
            'product_code' => 'FAST_INSTANT_TRADE_PAY',
        ];
    }
}
