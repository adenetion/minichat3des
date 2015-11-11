$("#frmMsg").validate({
    rules: {
        mensagem: { required: true, minlength: 2 }
    },
    messages: {
        mensagem: {
            required: "Você não pode enviar uma mensagem em branco.",
            minlength: "Sua mensagem requer, no mínimo, dois caracteres"
        }
    },
    submitHandler: function(form){
    }
});

var updateMsgPanel = function(){
    var options = {
        type: 'get',
        async: false,
        dataType: 'json'
    };
    var url = '/ajax/ControleMensagem/listar';
    var jsonNoParsed = $.ajax(url, options).responseText;
    jsonNoParsed = jsonNoParsed.substr(0, jsonNoParsed.length -2);
    var messages = $.parseJSON(jsonNoParsed);
    //limpando o painel
    $('div#chatPanel').html("");
    
    //encriptando os dados
    var options = {
        type: 'get',
        async: false,
    };

    var k = $.ajax('/ajax/Sessao/Cryptokey', options).responseText;
    var iv = $.ajax('/ajax/Sessao/Cryptoiv', options).responseText;

    if(messages !== null && messages.length > 0){
        console.info(messages.length);
        $.each(messages, function(){
            var linha = $('<div class="row marg-top10"></div>');
            var col_nick = $('<div class="col-sm-1 nick text-right">'
                            + this.nick +
                            '</div>');
            var col_msg = $('<div class="col-sm-10">'
                                + 
                                    des(hexToString(k), 
                                        hexToString(this.mensagem), 
                                        0, 1, hexToString(iv)) 
                                + '</div>'
                           );
            var col_hora = $('<div class="col-sm-1 text-left">'
                            + this.hora +
                            '</div>');
            
            linha.append(col_nick);
            linha.append(col_msg);
            linha.append(col_hora);
            
            $('div#chatPanel').append(linha);
        });
        
    }
};


$("form").on('submit', function(e){
    e.preventDefault();
    $(this).validate();
    if($(this).valid()){
        var msg = $("#txtmsg").val();
        var user = $("#userID").val();

        //encriptando os dados
        var options = {
            type: 'get',
            async: false,
        };

        var k = $.ajax('/ajax/Sessao/Cryptokey', options).responseText;
        var iv = $.ajax('/ajax/Sessao/Cryptoiv', options).responseText;

        var encText = stringToHex(des(hexToString(k), msg, 1, 1, hexToString(iv)));

        var url = "/ajax/ControleMensagem/enviar/"
                + user + "/"
                + encText;

        var opt = {
            method: 'post',
            async: false,
            success: function(data){
                $("#frmMsg")[0].reset();
                window.location.reload();
            }
        };

        $.ajax(url, opt);

        console.info(url);
        console.info(data);
    }
});

$("#btnSair").on('click',function(){
    var options = {
        type: 'post',
        async: false,
        success: function(data){
            alert(data);
            window.location.assign("http://minichat3des.org/");
        }
    };
    
    var s = $.ajax('/ajax/ControleUsuario/logout', options);
});

$(document).ready(function(){
    setInterval(updateMsgPanel(), 500);
});