<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-01
 */

namespace PiuIO\Pay\Responses;

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
                'charge_url',
            ]
        );
        $resolver->setDefaults(
            [
                'parameters' => [],
            ]
        );
        $resolver->setAllowedTypes('parameters', 'array');
    }
}
