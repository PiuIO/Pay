<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-01
 */

namespace PiuIO\Pay\Responses;

use PiuIO\Pay\Utils\AbstractOption;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Close extends AbstractOption
{
    /**
     * @param OptionsResolver $resolver
     */
    protected function configureResolver(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'order_id' => '',
                'trade_sn' => '',
            ]
        );
    }
}
