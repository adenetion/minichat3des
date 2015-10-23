
$("frmLogin").validate({
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
    }
});

var form = $("#frmLogin");

$("#btnLogin").on('click', function(){
    form.validate();
    if(form.valid()){
        var mail = $('#loginEmail').val();
        var password = $('#loginPassword').val();
        
        var options = {
            type: 'get',
            async: false,
            dataType: 'json'
        };

        var s = $.ajax('public/js/srp.json', options).responseJSON;
        
        mail = stringToHex(des(s.k, mail, 1, 1, hexToString(s.iv)));
        password = stringToHex(des(s.k, password, 1, 1, hexToString(s.iv)));
        
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
                
                $("#dlgLogin").modal('hide');
            }
        };
        
        $.ajax(url, options);
    }
});