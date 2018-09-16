<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-05
 */

namespace PiuIO\Pay\Utils;

class Amount
{
    /**
     * 货币单位元转分.
     *
     * @param $amount
     *
     * @return string
     */
    public static function dollarToCent($amount)
    {
        return bcmul($amount, 100, 0);
    }

    /**
     * 货币单位分转元.
     *
     * @param $amount
     *
     * @return string
     */
    public static function centToDollar($amount)
    {
        return bcdiv($amount, 100, 2);
    }
}
