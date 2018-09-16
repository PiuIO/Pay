<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-06
 */

namespace PiuIO\Pay\Utils;

class Str
{
    /**
     * @param $string
     *
     * @return string
     */
    public static function studly($string)
    {
        return ucfirst(str_replace(' ', '', lcfirst(ucwords(str_replace(['-', '_'], ' ', $string)))));
    }
}
