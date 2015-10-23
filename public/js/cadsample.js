/**
 * Dispara a validação HTML5 do campo email
 * @returns {Boolean}
 */
var checkEmail = function(){
    return $('#cadEmail')[0].checkValidity() ? true : $('#cadEmail').tooltip('toggle');
};

/**
 * Dispara a validação HTML5 do campo nome
 * @returns {Boolean}
 */
var checkNome = function(){
    return $('#cadNome')[0].checkValidity() ? true : $('#cadNome').tooltip('toggle');
};

/**
 * Dispara a validação HTML5 do campo sobrenome
 * @returns {Boolean}
 */
var checkSobrenome = function(){
    return $('#cadSobrenome')[0].checkValidity() ? true : $('#cadSobrenome').tooltip('toggle');
};

/**
 * Dispara a validação HTML5 do campo apelido
 * @returns {Boolean}
 */
var checkApelido = function(){
    return $('#cadApelido')[0].checkValidity() ? true : $('#cadApelido').tooltip('toggle');
};

/**
 * Dispara a validação HTML5 do campo senha
 * @returns {Boolean}
 */
var checkSenha = function(){
    return $('#cadPassword')[0].checkValidity() ? true : $('#cadPassword').tooltip('toggle');
};

/**
 * Faz a validação da confirmação de senha
 * @returns {Boolean}
 */
var checkConfirmacao = function(){
    return $('#cadPassCheck')[0].checkValidity() && $('#cadPassword').val() === $('#cadPassCheck').val() ? true : $('#cadPassCheck').tooltip('toggle');
};

// Valida os campos e envia os dados criptografados do form
$('#cadSubmit').on('click',function(e){
    if(checkEmail() && checkNome() && checkSobrenome() && 
    checkApelido() && checkSenha()){
        if(checkConfirmacao()){
            
            //obtendo os dados do formulário
            var mail = $('#cadEmail').val();
            var name = $('#cadNome').val();
            var lastname = $('#cadSobrenome').val();
            var nick = $('#cadApelido').val();
            var password = $('#cadPassword').val();
            
            
            //encriptando os dados des (key, message, 1, 1, "HookL337");
            var options = {
                type: 'get',
                async: false,
                dataType: 'json'
            };
            
            var s = $.ajax('js/srp.json', options).responseJSON;
            
            mail = stringToHex(des(s.k, mail, 1, 1, s.iv));
            name = stringToHex(des(s.k, name, 1, 1, s.iv));
            lastname = stringToHex(des(s.k, lastname, 1, 1, s.iv));
            nick = stringToHex(des(s.k, nick, 1, 1, s.iv));
            password = stringToHex(des(s.k, password, 1, 1, s.iv));


            //juntando os dados em um objeto
            var data = {
                "email": mail,
                "nome": name,
                "sobrenome": lastname,
                "apelido": nick,
                "senha": password
            };

            console.info(data);
        }
    }
    //$('#dlgCadastro').modal('hide');
});