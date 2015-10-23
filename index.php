<?php
require 'vendor/autoload.php';
use Controllers\ControleRota;
//phpinfo();
//echo mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_CBC);
//$mac_block_size = ceil(56/8);
////echo $mac_block_size;
//
//
//function str2Hex($text) {
//    for ($i = 0; $i < strlen($text); $i++) {
//        $out .= dechex(ord($text[$i]));
//    }
//    return $out;
//}
//
//echo nl2br(PHP_EOL . str2Hex("SegRedes Prof.Polliany"));
//$key = pack('H*', str2Hex("SegRedes Prof.Polliany"));
//echo nl2br(PHP_EOL . $key);

new ControleRota();