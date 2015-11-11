var options = {
    type: 'get',
    async: false,
    dataType: 'json'
};

var secret = $.ajax('js/parametros.json', options).responseJSON;
document.writeln(des("0x536567526564657358447c50726f662e506f6c6c69616e79", hexToString("0x6fb52195a9015a55"), 0, 1, "R1k1M4ru") + "<br>");

document.writeln(stringToHex("R1k1M4ru")+ "<br>");
document.writeln ("Segredo: " + hexToString(secret.segredo) + "<br>");                
var key = "R1k1M4ru";
var message = "O peito do pé de Pedro é preto, pretinho, pretão!";
var ciphertext = des (key, message, 1, 1, "HookL337");
document.writeln ("DES Test: " + stringToHex (ciphertext));
//document.writeln ("DES Test: " + ciphertext);
var deciphertext = des(key, hexToString(stringToHex (ciphertext)), 0, 1, "HookL337");
document.writeln ("<br>Plain Test: " + deciphertext);
document.writeln ("<br>Senha Mega: " + stringToHex(des (key, "B3ll4D0nn4#B1gP0rnSt4r69", 1, 1, "HookL337")));