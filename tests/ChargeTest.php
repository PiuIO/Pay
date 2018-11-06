<?php
/**
 * User: sunguide
 * Date: 2018/8/15
 * Time: 23:48
 * Description:GatewaryTest.php
 */

require __dir__.'/../vendor/autoload.php';

use PiuIO\Pay\Cashier;

class ChargeTest extends \PHPUnit_Framework_TestCase
{
    public function testAlipay()
    {

        // 按格式组装好配置
        $config = [

        ];

        // 创建实例, 传入要使用的 Gateway
        $cashier = new Cashier('alipay_qr', $config);

        // 组装 ChargeRequestForm
        $data = [
            'order_id' => '151627101400000071',
            'subject' => 'testing',
            'amount' => 1,
            'currency' => 'CNY',
            'description' => 'testing description',
            'return_url' => 'https://www.baidu.com',
            'expired_at' => time() + 70,
        ];
        var_dump($data);

        $form = $cashier->charge($data);
        var_dump($form);

        return var_dump($form->get('charge_url'));
    }
}
