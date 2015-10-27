<?php

/* chat.html */
class __TwigTemplate_d1126e79d3e4486968f69d805b4781c72c74a3c5a856348d25f40c91ce68785a extends Twig_Template
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
        <link href=\"public/css/fonts.css\" rel=\"stylesheet\">
        <link href=\"public/css/icons.css\" rel=\"stylesheet\">
        <link href=\"public/css/chat.css\" rel=\"stylesheet\">
        
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
            <div class=\"row\" role=\"main\">
                <div class=\"row\">
                    <div class=\"col-md-12 text-center\">
                        <h4>Mini Chat 3DES</h4>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-10 col-md-offset-1 chat-panel\">
                    </div>
                </div>
                <div class=\"row \" style=\"padding: 10px 0\">
                    <form id=\"frmMsg\" class=\"form-inline\" action=\"#\" method=\"post\" role=\"form\">
                        <div class=\"form-group-md\">
                            <input type=\"hidden\" name=\"id_user\" id=\"userID\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : null), "id", array()), "html", null, true);
        echo "\">
                            <label class=\"control-label col-md-1 text-right\">Mensagem: </label>
                            <div class=\"col-md-10\">
                                <textarea class=\"form-control\" name=\"mensagem\" 
                                id = \"txtmsg\"
                                style=\"width: 98%;\"
                                required placeholder=\"Sua mensagem\"></textarea>
                                
                            </div>
                        </div>
                        <input class=\"btn btn-info btn-sm marg-bottom5 marg-top0\" type=\"submit\" value=\"Enviar\" >
                        <input class=\"btn btn-danger btn-sm marg-bottom5 marg-top0\" type=\"button\" value=\"Sair\">
                    </form>
                </div>
            </div>
            <footer class=\"text-muted text-center bottom\">
                <p>&COPY; 2015 UEA - Universidade do Estado do Amazonas</p>
            </footer>
        </div>
        <script src=\"public/js/jquery.validate.min.js\" type=\"text/javascript\"></script>
        <script src=\"public/js/messages_pt_BR.min.js\" type=\"text/javascript\"></script>
        <script src=\"public/js/chat.js\" type=\"text/javascript\"></script>
    </body>
</html>
<!--<div></div>-->";
    }

    public function getTemplateName()
    {
        return "chat.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 49,  19 => 1,);
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
/*         <link href="public/css/fonts.css" rel="stylesheet">*/
/*         <link href="public/css/icons.css" rel="stylesheet">*/
/*         <link href="public/css/chat.css" rel="stylesheet">*/
/*         */
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
/*             <div class="row" role="main">*/
/*                 <div class="row">*/
/*                     <div class="col-md-12 text-center">*/
/*                         <h4>Mini Chat 3DES</h4>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="row">*/
/*                     <div class="col-md-10 col-md-offset-1 chat-panel">*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="row " style="padding: 10px 0">*/
/*                     <form id="frmMsg" class="form-inline" action="#" method="post" role="form">*/
/*                         <div class="form-group-md">*/
/*                             <input type="hidden" name="id_user" id="userID" value="{{usuario.id}}">*/
/*                             <label class="control-label col-md-1 text-right">Mensagem: </label>*/
/*                             <div class="col-md-10">*/
/*                                 <textarea class="form-control" name="mensagem" */
/*                                 id = "txtmsg"*/
/*                                 style="width: 98%;"*/
/*                                 required placeholder="Sua mensagem"></textarea>*/
/*                                 */
/*                             </div>*/
/*                         </div>*/
/*                         <input class="btn btn-info btn-sm marg-bottom5 marg-top0" type="submit" value="Enviar" >*/
/*                         <input class="btn btn-danger btn-sm marg-bottom5 marg-top0" type="button" value="Sair">*/
/*                     </form>*/
/*                 </div>*/
/*             </div>*/
/*             <footer class="text-muted text-center bottom">*/
/*                 <p>&COPY; 2015 UEA - Universidade do Estado do Amazonas</p>*/
/*             </footer>*/
/*         </div>*/
/*         <script src="public/js/jquery.validate.min.js" type="text/javascript"></script>*/
/*         <script src="public/js/messages_pt_BR.min.js" type="text/javascript"></script>*/
/*         <script src="public/js/chat.js" type="text/javascript"></script>*/
/*     </body>*/
/* </html>*/
/* <!--<div></div>-->*/
