/**
 * Definindo a validação do formulário
 */
$("#frmCadUser").validate({
    rules: {
        email: { required: true, email: true },
        nome: { required: true, minlength: 3 },
        sobrenome: { required: true, minlength: 2 },
        apelido: { required: true, minlength: 2 },
        senha: {required: true, minlength: 6 },
        confirma: { required: true, minlength: 6, equalTo: "#cadPassword" }
    },
    messages: {
        email: "Por favor, informe um email válido.",
        nome: {
            required: "Por favor, preencha seu nome.",
            minlength: "no mínimo três caracteres"
        },
        sobrenome: {
            required: "Por favor, preencha seu sobrenome.",
            minlength: "no mínimo dois caracteres"
       },
       apelido: {
            required: "Por favor, seu nome no chat.",
            minlength: "no mínimo três caracteres"
       },
       senha: {
            required: "Registre uma senha.",
            minlength: "No mínimo seis caracteres"
       },
       confirma:{
           required: "Confirme sua senha.",
           minlength: "No mínimo seis caracteres",
           equalTo: "Repita a senha."
       }
    },
    submitHandler: function(form){
        //obtendo os dados do formulário
        var mail = $('#cadEmail').val();
        var name = $('#cadNome').val();
        var lastname = $('#cadSobrenome').val();
        var nick = $('#cadApelido').val();
        var password = $('#cadPassword').val();


        //encriptando os dados
        var options = {
            type: 'get',
            async: false,
        };

        var k = $.ajax('/ajax/Sessao/Cryptokey', options).responseText;
        var iv = $.ajax('/ajax/Sessao/Cryptoiv', options).responseText;
        
        mail = stringToHex(des(hexToString(k), mail, 1, 1, hexToString(iv)));
        name = stringToHex(des(hexToString(k), name, 1, 1, hexToString(iv)));
        lastname = stringToHex(des(hexToString(k), lastname, 1, 1, hexToString(iv)));
        nick = stringToHex(des(hexToString(k), nick, 1, 1, hexToString(iv)));
        password = stringToHex(des(hexToString(k), password, 1, 1, hexToString(iv)));

        //juntando os dados em um objeto
        var data = {
            "email": mail,
            "nome": name,
            "sobrenome": lastname,
            "apelido": nick,
            "senha": password
        };
        
        var url = "/ajax/ControleUsuario/cadastrar/"
                + data.email + "/"
                + data.nome + "/"
                + data.sobrenome + "/"
                + data.apelido + "/"
                + data.senha;
        
        var opt = {
            method: 'post',
            async: false,
            data: data,
            success: function(data){
                alert(data);
                $("#dlgCadastro").modal('hide');
            }
        };
        $.ajax(url, opt);
        console.info(url);
        console.info(data);
        console.info("chave: " + k);
        console.info("iv: " + iv);

    }
});