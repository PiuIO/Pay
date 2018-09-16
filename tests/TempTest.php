<?php
/**
 * User: sunguide
 * Date: 2018/8/15
 * Time: 23:48
 * Description:GatewaryTest.php
 */

require __dir__.'/../vendor/autoload.php';

use PiuIO\Pay\Cashier;

class TempTest extends \PHPUnit_Framework_TestCase
{
    public function testAlipay()
    {
        $sign = '';

        $private = '-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEAqdh1swbtLPzbjqkb41A9ezKzcyGbSLqWbwxE5taDsm8J8sIB
JEo//1tL2jgvKMghFq/ck/OoeZcIpSQIGwyfWnjRVxYIAGi+Fsmj1rhHI6Bb76e6
mkdH7H8Xg9HIAunC0JvDwiGv7wggdylBG8KQhzHXRmoo3OZKzNLPi7MxYkp3r7rQ
ADSYnSQhixCNp2XkYeOS4YjwbCWXEi86g6RspWj1u2XlcmXc1LYB39Bg2A50Le1o
7GZO74wzm+cUo8Gs0Cw6sbXnw+jrRMu4Fn1evK0dSpCRCIPVauIVIwYaCYpN3Maq
MX2hG2QNT7EKIMLWeXL5mzRfu2NEt7lvceA2IQIDAQABAoIBAFhFEwZz9xeGYmUG
JmRA83LvqquPL7DgqAYWjkiZ+9/kLXtosEc3/4Kq5AUJZhj/yZKM20pZO5nVkLyi
uUO1j6vpVoK4BHiR9xjIusmBBBfT43Pt6+D6YrraYlIz2IsLCiB4k4h1EYZc5uKH
IjtXJt3cXVFPIuWLGhzRAuRLwMKfr8palMvI8pmI5E3TB1YKoBIV2WrQuOtM5O6T
X4WLhyfiCJ90msNYqEjLaM22ooBIU9I0QFSrnrED+6VJR2xyaLMe6U4pPH76Au/e
/4k2nfiwC0OtYaoSVqaTr8VhdK+W4swePv/hPdYjima3KrPOdva1FHTqwAYDHBiS
UefsFjECgYEA32mPaGQAcQx5NusmwB3cs81DNstqPWk/nyWvxD4KUH8K3+iHQTBl
7TAr2PQSe7xg3QwDdZPq9aQAk4BRofashs47KQsKNuhp8/9F21z4hmy+PLIEEpUf
ksBZYrX3fGdHwXexA4FwmLlfdwc7lzeCZBnODF3onS1Z4Aiai/wZXmcCgYEAwp6p
cR9z36HHOTkgockEf7SKYuBCFlg1Pz2zN6ul+u7US6DNjFtZOxBahoiXzS9Rrp+7
z/uVJiaEC078vps14VQccu6YnCQsXTTaQgpvxpwC7kcCPzLu4gBpM6K2kjOQun3K
MhTLqM/seJ9Va19llfYWTnu+/ZDeiRCKtip64jcCgYEAo7AC23hRfoKmGR/HX4FB
oBcnRPFa4K3JaIBDPKQ8CGhcflsvJgsg0ty1c5q4JCKMUciojDAZOWq05V1h8in6
lDZr0BF/pWU5pAUHmMaQbGUmKPBA3aCW5n25wAIU1vgQ8eYRMsFWzv8au+n3tj58
cX0ao6L2eJquu99x5FiL+ccCgYBzwXL+ubpt1Qdt3bCvCaUHYBa/YKtuJuDk0In8
HrgGXG8g3G/lf5+/JabyReQkQnTO7GsE9ZpsqpP3Ne/WXvLZJvIU2h0jIdDRT1JR
3WtGMhz8JHgNpvm2qo/oCmuU4d6/TXop93x619DKndpslr0RSOFTpP6gSr5Rv+kB
GJsmWQKBgEeA6Ju9g8OmGuzY3ygc4mONcykfFzmvj36X+uuyI9XaXpyXYr9ReEAT
DdSQxojM0dlviMO7XyQ9tIAxWnaD6XL3WHQCasR9QXXxzZQ7X2jTPIFMKkqViDb1
KCInMXUDlak1YvoI63RuQ1IL9rElyLNmhtNq3IBdhtSheswY2PeE
-----END RSA PRIVATE KEY-----';
        openssl_sign(
            "ddddddd",$sign, $private, OPENSSL_ALGO_SHA256
        );
        var_dump(base64_encode($sign));

    }
}
