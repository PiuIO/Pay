<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-01
 */

namespace PiuIO\Pay\Requests;

use PiuIO\Pay\Utils\AbstractOption;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Charge extends AbstractOption
{
    /**
     * @param OptionsResolver $resolver
     */
    protected function configureResolver(OptionsResolver $resolver): void
    {
        $resolver->setRequired(
            [
                'order_id',
                'subject',
                'amount',
                'currency',
                'description',
            ]
        );
        $resolver->setDefaults(
            [
                'user_ip'    => '127.0.0.1',
                'return_url' => '',
                'show_url'   => '',
                'body'       => '',
                'expired_at' => '',
                'created_at' => '',
            ]
        );
    }
}
