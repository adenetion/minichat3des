<?php

namespace Controllers;

require_once __DIR__ . '/../Library/cypher3des.php';

use Respect\Rest\Router;
use Controllers\ControleUsuario;
use Controllers\ControleMensagem;
use Models\Usuario;
use Models\Mensagem;
use Library\Container;
use Viewers\Inicial;
use Viewers\Chat;

/**
 * Description of ControleRota
 *
 * @author adenilton
 */
class ControleRota {
    
    protected $router;
    
    public function __construct() {
        $myRouter = Container::getRouter();
        
        $this->pageDefault($myRouter);
        $this->pageChat($myRouter);
        $this->postCadUser($myRouter);
        $this->postLoginUser($myRouter);
        $this->getMensagens($myRouter);
        $this->postEnviarMensagem($myRouter);
        $this->postLoguot($myRouter);
    }

    public function pageChat(Router $r) {
        $r->get("/chat", function() {
            $fs = Container::getTwigLoderFileSystem(__DIR__ . "/../../public/");
            $options = ["auto_reload" => true, 
                        "cache" => __DIR__ . "/../../public/cache"];
            $twig = Container::getTwigEnvironment($fs, $options);
            $chat = new Chat($twig);
            $s = Container::getSession();
            $chat->add('usuario', $s->get('usuario'));
            $chat->exibir('chat.html');
        });
    }
    
    public function pageDefault(Router $r) {
        $r->get("/", function() {
            $fs = Container::getTwigLoderFileSystem(__DIR__ . "/../../public/");
            $options = ["auto_reload" => true, 
                        "cache" => __DIR__ . "/../../public/cache"];
            $twig = Container::getTwigEnvironment($fs, $options);
            $index = new Inicial($twig);
            $index->exibir('default.html');
        });
    }
    
    public function postCadUser(Router $r) {
        $r->post('/ajax/ControleUsuario/cadastrar/**', function($uinfo){
            
            // lê o conteúdo do arquivo para uma string
            $jsrc = Container::getCrytoParams();
            extract($jsrc);
            
            $ud = array(
                "email" => mcrypt_decrypt(
                            MCRYPT_3DES, 
                            safeHexToString($k), 
                            safeHexToString($uinfo[0]), 
                            MCRYPT_MODE_CBC, 
                            safeHexToString($iv)),
                
                "nome" => mcrypt_decrypt(
                            MCRYPT_3DES, 
                            safeHexToString($k), 
                            safeHexToString($uinfo[1]), 
                            MCRYPT_MODE_CBC, 
                            safeHexToString($iv)),
                
                "sobrenome" => mcrypt_decrypt(
                            MCRYPT_3DES, 
                            safeHexToString($k), 
                            safeHexToString($uinfo[2]), 
                            MCRYPT_MODE_CBC, 
                            safeHexToString($iv)),
                
                "apelido" => mcrypt_decrypt(
                            MCRYPT_3DES, 
                            safeHexToString($k), 
                            safeHexToString($uinfo[3]), 
                            MCRYPT_MODE_CBC, 
                            safeHexToString($iv)),
                
                "senha" => $uinfo[4]
            );
            
            $em = Container::gerEntityManager();
            $c = new ControleUsuario($em);
            $us = new Usuario();
            
            $c->cadastrar($us, $ud);
            unset($c, $us);
        });
    }
    
    public function postLoginUser(Router $r) {
        $r->post('/ajax/ControleUsuario/login/*/*', function($email, $senha) {
            $em = Container::gerEntityManager();
            $c = new ControleUsuario($em);
            
            
            $jsrc = Container::getCrytoParams();
            extract($jsrc);
            
            $login = array(
                "email" => mcrypt_decrypt(
                            MCRYPT_3DES, 
                            safeHexToString($k), 
                            hexToString($email), 
                            MCRYPT_MODE_CBC, 
                            safeHexToString($iv)),
                "senha" => $senha
            );
            $sessao = Container::getSession();
            $rsp = $c->login($login, $sessao);
            if($rsp){
                header("/chat");
            }
        });        
    }
    
    public function getMensagens(Router $r){
        $r->get("/ajax/ControleMensagem/listar", function() {
            $em = Container::gerEntityManager();
            $mc = new ControleMensagem($em);
            
            return json_encode($mc->listar());
        });
    }
    
    public function postEnviarMensagem(Router $r) {
        $r->post("/ajax/ControleMensagem/enviar/*/*", 
            function($userID, $txtmsg) {
                $jsrc = Container::getCrytoParams();
                extract($jsrc);

                $em = Container::gerEntityManager();
                $mc = new ControleMensagem($em);
                $rp = $em->getRepository('Models\Usuario');
                $u = $rp->findBy(["usId" => $userID]);
                $user = $u[0];
                $msg = new Mensagem();
                $decrypted = mcrypt_decrypt(
                                MCRYPT_3DES, 
                                safeHexToString($k), 
                                hexToString($txtmsg), 
                                MCRYPT_MODE_CBC, 
                                safeHexToString($iv)
                            );
                $mc->enviar($msg, $user, $decrypted);
            }
        );
    }
    
    public function postLoguot(Router $r) {
        $r->post("/ajax/ControleUsuario/logout", function() {
            $sessao = Container::getSession();
            $sessao->unsetKey("usuario");
            echo "Loged out";
        });
    }
}
