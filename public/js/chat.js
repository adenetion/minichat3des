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
    
    var messages = $.ajax('/ajax/ControleMensagem/listar', options).responseJSON;
    
    if(messages.length > 0){
        
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
            dataType: 'json'
        };

        var s = $.ajax('public/js/srp.json', options).responseJSON;

        var encText = stringToHex(des(s.k, msg, 1, 1, hexToString(s.iv)));

        var url = "/ajax/ControleMensagem/enviar/"
                + user + "/"
                + encText;

        var opt = {
            method: 'post',
            async: false,
            success: function(data){
                $("#frmMsg")[0].reset();
            }
        };

        $.ajax(url, opt);

        console.info(url);
        console.info(data);
    }
});