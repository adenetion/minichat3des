
$("#frmLogin").validate({
    rules: {
        email: { required: true, email: true },
        senha: {required: true, minlength: 6 }
    },
    messages: {
        email: "Por favor, informe um email válido.",
        senha: {
            required: "Registre uma senha.",
            minlength: "No mínimo seis caracteres"
       }
    },
    submitHandler: function(form){
        var mail = $('#loginEmail').val();
        var password = $('#loginPassword').val();
        
        var options = {
            type: 'get',
            async: false,
        };
        
        var k = $.ajax('/ajax/Sessao/Cryptokey', options).responseText;
        var iv = $.ajax('/ajax/Sessao/Cryptoiv', options).responseText;
        
        mail = stringToHex(des(hexToString(k), mail, 1, 1, hexToString(iv)));
        password = stringToHex(des(hexToString(k), password, 1, 1, hexToString(iv)));
        
        var url = '/ajax/ControleUsuario/login/'
                + mail + "/"
                + password;
        
        console.info(url);
        
        var options = {
            type: 'post',
            async: false,
            success: function(data){
                if(data === ""){
                    window.location.assign("http://minichat3des.org/chat");
                } else {
                    alert(data);
                }
            }
        };
        
        $.ajax(url, options);
    }
});