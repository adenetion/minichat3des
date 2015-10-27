<?php
    
function tdesEncrypt(){
    $iv_size = mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_CBC);
    return $iv_size;
}

function str2Hex($text)
{
    for ($i = 0; $i < strlen($text); $i++) {
        $out .= dechex(ord($text[$i]));
    }
    return $out;
}

function stringToHex ($s) {
  $r = "0x";
  $hexes = array ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");
  for ($i=0; $i<strlen($s); $i++) {$r .= ($hexes [(ord($s{$i}) >> 4)] . $hexes [(ord($s{$i}) & 0xf)]);}
  return $r;
}

function hexToString ($h) {
  $r = "";
  for ($i= (substr($h, 0, 2)=="0x")?2:0; $i<strlen($h); $i+=2) {$r .= chr (base_convert (substr ($h, $i, 2), 16, 10));}
  return $r;
}

/**
 *
 * Convert input HEX encoded string to a suitable format for decode
 * // Note: JS generates strings with a leading 0x
 *
 * @return string
 */
function safeHexToString($input)
{
    if(strpos($input, '0x') === 0)
    {
        $input = substr($input, 2);
    }
    return hex2bin($input);
}

