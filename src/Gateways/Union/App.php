<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-01
 */

namespace PiuIO\Pay\Gateways\Union;

use PiuIO\Pay\Exception\GatewayException;
use PiuIO\Pay\Exception\GatewayMethodNotSupportException;
use PiuIO\Pay\Requests\Charge;
use PiuIO\Pay\Requests\Query;

class App extends AbstractUnionGateway
{
    /**
     * 支付.
     *
     * @param Charge $form
     *
     * @return array
     */
    public function charge(Charge $form): array
    {
        $payload = $this->createPayload(
            array_merge(
                [
                    'txnType'      => '01',
                    'txnSubType'   => '01',
                    'bizType'      => '000201',
                    'frontUrl'     => $form->get('return_url'),
                    'backUrl'      => $this->config->get('notify_url'),
                    'channelType'  => '08',
                    'orderId'      => $form->get('order_id'),
                    'txnTime'      => date('YmdHis', $form->get('created_at')),
                    'txnAmt'       => $form->get('amount'),
                    'currencyCode' => '156',
                    'orderDesc'    => $form->get('description'),
                ],
                $form->get('extras')
            )
        );

        $response = $this->request(self::APP_CHARGE, $payload);

        if (!isset($response['tn'])) {
            throw new GatewayException('Union Gateway Error: tn not found');
        }

        return [
            'charge_url' => '',
            'parameters' => [
                'tn'       => $response['tn'],
                'mode'     => '00',
                'order_id' => $form->get('order_id'),
            ],
        ];
    }

    /**
     * 查询.
     *
     * @param Query $form
     *
     * @return array
     */
    public function query(Query $form): array
    {
        throw new GatewayMethodNotSupportException();
    }
}
