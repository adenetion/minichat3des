<?php

/* default.html */
class __TwigTemplate_c77cef6e512e754e53dcbddb4e36884869eee21d8103ffc33531f57578541e0f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>MiniChat 3DES</title>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <!-- Favicon -->
        <link rel=\"icon\" href=\"public/images/security-chat.svg\">
        
        <!-- Bootstrap -->
        <link href=\"public/css/bootstrap.min.css\" rel=\"stylesheet\">
        
        <!-- custom style -->
        <link href=\"public/css/style-library-1.css\" rel=\"stylesheet\">
        <link href=\"public/css/default.css\" rel=\"stylesheet\">
        <link href=\"public/css/fonts.css\" rel=\"stylesheet\">
        <link href=\"public/css/icons.css\" rel=\"stylesheet\">
        <!-- JQuery e Bootstrap js -->
        <script src=\"public/js/jquery.js\" type=\"text/javascript\"></script>
        <script src=\"public/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        <script src=\"public/js/des.js\" type=\"text/javascript\"></script>
    </head>
    <body>
        <div class=\"container-fluid\">
            <header>
                <div class=\"row\">
                    <div class=\"col-md-4  text-left\">
                        <div class=\"icon-UEA\"></div>
                    </div>
                    <div class=\"col-md-4 col-md-offset-4 text-left\">
                        <h1 class=\"h1\">Segurança de Redes</h1>
                    </div>
                </div>
            </header>
            <div role=\"main\" class=\"row\">
                <div class=\"col-md-8 col-md-offset-2 text-center\">
                    <div class=\"content-block tranparente\">
                        <h1>Mini Chat 3DES</h1>
                        <p class=\"lead\">Equipe: <br>
                            Adenilton Barroso <br>
                            Hélio Azevedo <br>
                            Iauata Firmo
                        </p>
                    </div>
                </div>
                <div class=\"col-md-6 col-md-offset-3 text-center\">
                    <div class=\"col-md-6\">
                        <button type=\"button\" class=\"btn btn-primary btn-block\" data-toggle=\"modal\" data-target=\"#dlgLogin\">Entrar</button>
                    </div>
                    <div class=\"col-md-6\">
                        <button type=\"button\" class=\"btn btn-info btn-block\" data-toggle=\"modal\" data-target=\"#dlgCadastro\">Cadastre-se</button>
                    </div>
                </div>
            </div>
            <footer class=\"text-muted text-center bottom\">
                <p>&COPY; 2015 UEA - Universidade do Estado do Amazonas</p>
            </footer>
            <!-- Modal Login -->
            <div class=\"modal fade\" id=\"dlgLogin\" role=\"dialog\">
                <div class=\"modal-dialog\">
                    <!-- Modal content-->
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                        <h4 class=\"modal-title\">MiniChat 3DES - Login</h4>
                    </div>
                    <div class=\"modal-body\">
                        <div class=\"row\">
                            <div class=\"col-sm-6 col-sm-offset-3 form-login-container\">
                                <form id=\"frmLogin\" class=\"form-horizontal\" name=\"login\" method=\"post\" role=\"form\">
                                    <div class=\"form-group\">
                                        <label class=\"control-label white col-sm-2\" for=\"loginEmail\">Email:</label>
                                        <div class=\"col-sm-10\">
                                            <input type=\"email\" class=\"form-control marg-left5\" id=\"loginEmail\" name=\"email\" placeholder=\"email@dominio.com\" required=\"required\" >
                                        </div>
                                    </div>
                                    <div class=\"form-group\">
                                        <label class=\"control-label white col-sm-2\" for=\"loginPassword\">Senha:</label>
                                        <div class=\"col-sm-10\">
                                            <input type=\"password\" class=\"form-control marg-left5\" id=\"loginPassword\" name=\"senha\" placeholder=\"Password\" required=\"required\" >
                                        </div>
                                    </div>
                                    <div class=\"form-group text-center\">
                                        <button id=\"btnLogin\" type=\"button\" class=\"btn btn-danger btn-sm\">Entrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-outline-sm btn-sm\" data-dismiss=\"modal\">Fechar</button>
                    </div>
                </div>
            </div>
            
            <!-- Modal Cadastro -->
            <div class=\"modal fade\" id=\"dlgCadastro\" role=\"dialog\">
                <div class=\"modal-dialog\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                        <h4 class=\"modal-title\">MiniChat 3DES - Cadastro</h4>
                    </div>
                    <div class=\"modal-body\">
                        <div class=\"row\">
                            <div class=\"col-sm-8 col-sm-offset-2 form-container\">
                                <form class=\"form-horizontal\" id=\"frmCadUser\" name=\"cadastro\" method=\"post\" role=\"form\">
                                    <div class=\"form-group\">
                                        <label for=\"cadEmail\" class=\"control-label col-sm-3\">Email:</label>
                                        <div class=\"col-sm-9\">
                                            <input type=\"email\" 
                                                   id=\"cadEmail\" 
                                                   name=\"email\" 
                                                   placeholder=\"email@domain.com\" 
                                                   data-toggle=\"tooltip\" 
                                                   data-placement=\"bottom\" 
                                                   title=\"Informe seu email\" 
                                                   required
                                                   class=\"form-control\">
                                        </div>
                                    </div>
                                    <div class=\"form-group\">
                                        <label for=\"cadNome\" class=\"control-label col-sm-3\">Nome:</label>
                                        <div class=\"col-sm-9\">
                                            <input type=\"text\" 
                                                   id=\"cadNome\" 
                                                   name=\"nome\"
                                                   placeholder=\"First Name\" 
                                                   maxlength=\"20\" 
                                                   data-toggle=\"tooltip\" 
                                                   data-placement=\"bottom\" 
                                                   title=\"Por favor, preencha seu nome.\" 
                                                   required
                                                   class=\"form-control\">
                                        </div>
                                    </div>
                                    <div class=\"form-group text-right\">
                                        <label for=\"cadSobrenome\" class=\"control-label col-sm-3\">Sobrenome:</label>
                                        <div class=\"col-sm-9\">
                                            <input type=\"text\" 
                                                   id=\"cadSobrenome\" 
                                                   name=\"sobrenome\" 
                                                   placeholder=\"Last Name\" 
                                                   maxlength=\"20\"
                                                   data-toggle=\"tooltip\" 
                                                   data-placement=\"bottom\" 
                                                   title=\"Por favor, preencha seu sobrenome.\" 
                                                   required
                                                   class=\"form-control\">
                                        </div>
                                    </div>
                                    <div class=\"form-group text-right\">
                                        <label for=\"cadApelido\" class=\"control-label col-sm-3\">Apelido:</label>
                                        <div class=\"col-sm-9\">
                                            <input type=\"text\" 
                                                   id=\"cadApelido\" 
                                                   name=\"apelido\" 
                                                   placeholder=\"Nickname\" 
                                                   maxlength=\"15\"
                                                   data-toggle=\"tooltip\" 
                                                   data-placement=\"bottom\" 
                                                   title=\"Por favor, seu apelido no chat.\" 
                                                   required
                                                   class=\"form-control\">
                                        </div>
                                    </div>
                                    <div class=\"form-group text-right\">
                                        <label for=\"cadPassword\" class=\"control-label col-sm-3\">Senha:</label>
                                        <div class=\"col-sm-9\">
                                            <input type=\"password\" 
                                                   id=\"cadPassword\" 
                                                   name=\"senha\" 
                                                   placeholder=\"Password\" 
                                                   maxlength=\"16\"
                                                   data-toggle=\"tooltip\" 
                                                   data-placement=\"bottom\" 
                                                   title=\"Por favor, preencha uma senha.\" 
                                                   required
                                                   class=\"form-control\">
                                        </div>
                                    </div>
                                    <div class=\"form-group text-right\">
                                        <label for=\"cadPassCheck\" class=\"control-label col-sm-3\">Confirmar:</label>
                                        <div class=\"col-sm-9\">
                                            <input type=\"password\" 
                                                   id=\"cadPassCheck\" 
                                                   name=\"confirma\" 
                                                   placeholder=\"Repeat Password\" 
                                                   maxlength=\"16\"
                                                   data-toggle=\"tooltip\" 
                                                   data-placement=\"bottom\" 
                                                   title=\"Deve coincidir com a senha informada\" 
                                                   required
                                                   class=\"form-control\">
                                        </div>
                                    </div>
                                    <div class=\"form-group text-center\">
                                        <button type=\"button\" id=\"cadSubmit\" class=\"btn btn-info btn-sm\">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-outline-sm btn-sm\" data-dismiss=\"modal\">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <script src=\"public/js/jquery.validate.min.js\" type=\"text/javascript\"></script>
        <script src=\"public/js/cadastro.js\" type=\"text/javascript\"></script>
        <script src=\"public/js/login.js\" type=\"text/javascript\"></script>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "default.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <title>MiniChat 3DES</title>*/
/*         <meta charset="UTF-8">*/
/*         <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*         <!-- Favicon -->*/
/*         <link rel="icon" href="public/images/security-chat.svg">*/
/*         */
/*         <!-- Bootstrap -->*/
/*         <link href="public/css/bootstrap.min.css" rel="stylesheet">*/
/*         */
/*         <!-- custom style -->*/
/*         <link href="public/css/style-library-1.css" rel="stylesheet">*/
/*         <link href="public/css/default.css" rel="stylesheet">*/
/*         <link href="public/css/fonts.css" rel="stylesheet">*/
/*         <link href="public/css/icons.css" rel="stylesheet">*/
/*         <!-- JQuery e Bootstrap js -->*/
/*         <script src="public/js/jquery.js" type="text/javascript"></script>*/
/*         <script src="public/js/bootstrap.min.js" type="text/javascript"></script>*/
/*         <script src="public/js/des.js" type="text/javascript"></script>*/
/*     </head>*/
/*     <body>*/
/*         <div class="container-fluid">*/
/*             <header>*/
/*                 <div class="row">*/
/*                     <div class="col-md-4  text-left">*/
/*                         <div class="icon-UEA"></div>*/
/*                     </div>*/
/*                     <div class="col-md-4 col-md-offset-4 text-left">*/
/*                         <h1 class="h1">Segurança de Redes</h1>*/
/*                     </div>*/
/*                 </div>*/
/*             </header>*/
/*             <div role="main" class="row">*/
/*                 <div class="col-md-8 col-md-offset-2 text-center">*/
/*                     <div class="content-block tranparente">*/
/*                         <h1>Mini Chat 3DES</h1>*/
/*                         <p class="lead">Equipe: <br>*/
/*                             Adenilton Barroso <br>*/
/*                             Hélio Azevedo <br>*/
/*                             Iauata Firmo*/
/*                         </p>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="col-md-6 col-md-offset-3 text-center">*/
/*                     <div class="col-md-6">*/
/*                         <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#dlgLogin">Entrar</button>*/
/*                     </div>*/
/*                     <div class="col-md-6">*/
/*                         <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#dlgCadastro">Cadastre-se</button>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*             <footer class="text-muted text-center bottom">*/
/*                 <p>&COPY; 2015 UEA - Universidade do Estado do Amazonas</p>*/
/*             </footer>*/
/*             <!-- Modal Login -->*/
/*             <div class="modal fade" id="dlgLogin" role="dialog">*/
/*                 <div class="modal-dialog">*/
/*                     <!-- Modal content-->*/
/*                     <div class="modal-header">*/
/*                         <button type="button" class="close" data-dismiss="modal">&times;</button>*/
/*                         <h4 class="modal-title">MiniChat 3DES - Login</h4>*/
/*                     </div>*/
/*                     <div class="modal-body">*/
/*                         <div class="row">*/
/*                             <div class="col-sm-6 col-sm-offset-3 form-login-container">*/
/*                                 <form id="frmLogin" class="form-horizontal" name="login" method="post" role="form">*/
/*                                     <div class="form-group">*/
/*                                         <label class="control-label white col-sm-2" for="loginEmail">Email:</label>*/
/*                                         <div class="col-sm-10">*/
/*                                             <input type="email" class="form-control marg-left5" id="loginEmail" name="email" placeholder="email@dominio.com" required="required" >*/
/*                                         </div>*/
/*                                     </div>*/
/*                                     <div class="form-group">*/
/*                                         <label class="control-label white col-sm-2" for="loginPassword">Senha:</label>*/
/*                                         <div class="col-sm-10">*/
/*                                             <input type="password" class="form-control marg-left5" id="loginPassword" name="senha" placeholder="Password" required="required" >*/
/*                                         </div>*/
/*                                     </div>*/
/*                                     <div class="form-group text-center">*/
/*                                         <button id="btnLogin" type="button" class="btn btn-danger btn-sm">Entrar</button>*/
/*                                     </div>*/
/*                                 </form>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="modal-footer">*/
/*                         <button type="button" class="btn btn-outline-sm btn-sm" data-dismiss="modal">Fechar</button>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*             */
/*             <!-- Modal Cadastro -->*/
/*             <div class="modal fade" id="dlgCadastro" role="dialog">*/
/*                 <div class="modal-dialog">*/
/*                     <div class="modal-header">*/
/*                         <button type="button" class="close" data-dismiss="modal">&times;</button>*/
/*                         <h4 class="modal-title">MiniChat 3DES - Cadastro</h4>*/
/*                     </div>*/
/*                     <div class="modal-body">*/
/*                         <div class="row">*/
/*                             <div class="col-sm-8 col-sm-offset-2 form-container">*/
/*                                 <form class="form-horizontal" id="frmCadUser" name="cadastro" method="post" role="form">*/
/*                                     <div class="form-group">*/
/*                                         <label for="cadEmail" class="control-label col-sm-3">Email:</label>*/
/*                                         <div class="col-sm-9">*/
/*                                             <input type="email" */
/*                                                    id="cadEmail" */
/*                                                    name="email" */
/*                                                    placeholder="email@domain.com" */
/*                                                    data-toggle="tooltip" */
/*                                                    data-placement="bottom" */
/*                                                    title="Informe seu email" */
/*                                                    required*/
/*                                                    class="form-control">*/
/*                                         </div>*/
/*                                     </div>*/
/*                                     <div class="form-group">*/
/*                                         <label for="cadNome" class="control-label col-sm-3">Nome:</label>*/
/*                                         <div class="col-sm-9">*/
/*                                             <input type="text" */
/*                                                    id="cadNome" */
/*                                                    name="nome"*/
/*                                                    placeholder="First Name" */
/*                                                    maxlength="20" */
/*                                                    data-toggle="tooltip" */
/*                                                    data-placement="bottom" */
/*                                                    title="Por favor, preencha seu nome." */
/*                                                    required*/
/*                                                    class="form-control">*/
/*                                         </div>*/
/*                                     </div>*/
/*                                     <div class="form-group text-right">*/
/*                                         <label for="cadSobrenome" class="control-label col-sm-3">Sobrenome:</label>*/
/*                                         <div class="col-sm-9">*/
/*                                             <input type="text" */
/*                                                    id="cadSobrenome" */
/*                                                    name="sobrenome" */
/*                                                    placeholder="Last Name" */
/*                                                    maxlength="20"*/
/*                                                    data-toggle="tooltip" */
/*                                                    data-placement="bottom" */
/*                                                    title="Por favor, preencha seu sobrenome." */
/*                                                    required*/
/*                                                    class="form-control">*/
/*                                         </div>*/
/*                                     </div>*/
/*                                     <div class="form-group text-right">*/
/*                                         <label for="cadApelido" class="control-label col-sm-3">Apelido:</label>*/
/*                                         <div class="col-sm-9">*/
/*                                             <input type="text" */
/*                                                    id="cadApelido" */
/*                                                    name="apelido" */
/*                                                    placeholder="Nickname" */
/*                                                    maxlength="15"*/
/*                                                    data-toggle="tooltip" */
/*                                                    data-placement="bottom" */
/*                                                    title="Por favor, seu apelido no chat." */
/*                                                    required*/
/*                                                    class="form-control">*/
/*                                         </div>*/
/*                                     </div>*/
/*                                     <div class="form-group text-right">*/
/*                                         <label for="cadPassword" class="control-label col-sm-3">Senha:</label>*/
/*                                         <div class="col-sm-9">*/
/*                                             <input type="password" */
/*                                                    id="cadPassword" */
/*                                                    name="senha" */
/*                                                    placeholder="Password" */
/*                                                    maxlength="16"*/
/*                                                    data-toggle="tooltip" */
/*                                                    data-placement="bottom" */
/*                                                    title="Por favor, preencha uma senha." */
/*                                                    required*/
/*                                                    class="form-control">*/
/*                                         </div>*/
/*                                     </div>*/
/*                                     <div class="form-group text-right">*/
/*                                         <label for="cadPassCheck" class="control-label col-sm-3">Confirmar:</label>*/
/*                                         <div class="col-sm-9">*/
/*                                             <input type="password" */
/*                                                    id="cadPassCheck" */
/*                                                    name="confirma" */
/*                                                    placeholder="Repeat Password" */
/*                                                    maxlength="16"*/
/*                                                    data-toggle="tooltip" */
/*                                                    data-placement="bottom" */
/*                                                    title="Deve coincidir com a senha informada" */
/*                                                    required*/
/*                                                    class="form-control">*/
/*                                         </div>*/
/*                                     </div>*/
/*                                     <div class="form-group text-center">*/
/*                                         <button type="button" id="cadSubmit" class="btn btn-info btn-sm">Cadastrar</button>*/
/*                                     </div>*/
/*                                 </form>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="modal-footer">*/
/*                         <button type="button" class="btn btn-outline-sm btn-sm" data-dismiss="modal">Fechar</button>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*         <script src="public/js/jquery.validate.min.js" type="text/javascript"></script>*/
/*         <script src="public/js/cadastro.js" type="text/javascript"></script>*/
/*         <script src="public/js/login.js" type="text/javascript"></script>*/
/*     </body>*/
/* </html>*/
