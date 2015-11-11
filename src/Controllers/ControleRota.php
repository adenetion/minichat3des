<?php

namespace Controllers;

require_once __DIR__ . '/../Library/cypher3des.php';

use Respect\Rest\Router;
use Controllers\ControleUsuario;
use Controllers\ControleMensagem;
use Models\Usuario;
use Models\Mensagem;
use Library\Container;
use Library\Sessao;
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
        $mySession = Container::getSession();
        
        // Obtendo uma chave para a sessão atual.
        $k = stringToHex(Container::getRandomCryptoKey());
        if(!$mySession->existe("key")){$mySession->set("key", $k);}
        
        // Obtendo um vetor de inicialização para a sessão atual.
        $iv = stringToHex(Container::getRandomCryptoIv());
        if(!$mySession->existe("iv")){$mySession->set("iv", $iv);}
        
        $this->pageDefault($myRouter);
        $this->pageChat($myRouter);
        $this->postCadUser($myRouter);
        $this->postLoginUser($myRouter);
        $this->getMensagens($myRouter);
        $this->postEnviarMensagem($myRouter);
        $this->postLoguot($myRouter);
        $this->getCryptoKeySessao($myRouter);
        $this->getCryptoIvSessao($myRouter);
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
            $s = Container::getSession();
            $k = safeHexToString($s->get("key"));
            $iv = safeHexToString($s->get("iv"));
            
            $ud = array(
                "email" => mcrypt_decrypt(
                            MCRYPT_3DES, $k, safeHexToString($uinfo[0]), 
                            MCRYPT_MODE_CBC, $iv),
                
                "nome" => mcrypt_decrypt(
                            MCRYPT_3DES, $k, safeHexToString($uinfo[1]), 
                            MCRYPT_MODE_CBC, $iv),
                
                "sobrenome" => mcrypt_decrypt(
                            MCRYPT_3DES, $k, safeHexToString($uinfo[2]), 
                            MCRYPT_MODE_CBC, $iv),
                
                "apelido" => mcrypt_decrypt(
                            MCRYPT_3DES, $k, safeHexToString($uinfo[3]), 
                            MCRYPT_MODE_CBC, $iv),
                
                "senha" => $uinfo[4], 
                
                "cadkey" => base64_encode($k), "cadiv" => base64_encode($iv)
            );
            
            $em = Container::gerEntityManager();
            $c = new ControleUsuario($em);
            $us = new Usuario();
            
            $c->cadastrar($us, $ud);
            unset($c, $us);
        });
    }
    
    public function getCryptoKeySessao(Router $r) {
        $r->get('/ajax/Sessao/Cryptokey', function(){
            $s = Container::getSession();
            if($s->existe("key")){
                $key = $s->get('key');
            } else {
                return "Nao ha uma chave gerada nessa sessao.";
            }
            
            return $key;
        });
    }
    
    public function getCryptoIvSessao(Router $r) { 
        $r->get('/ajax/Sessao/Cryptoiv', function(){
            $s = Container::getSession();
            if($s->existe('iv')){
                $iv = $s->get('iv');
            } else {
                return "Nao ha um vetor de inicializacao gerado nessa sessao.";
            }
            
            return $iv;
        });
    }
    
    public function postLoginUser(Router $r) {
        $r->post('/ajax/ControleUsuario/login/*/*', function($email, $senha) {
            $em = Container::gerEntityManager();
            $c = new ControleUsuario($em);
            
            $s = Container::getSession();
            $k = safeHexToString($s->get("key"));
            $iv = safeHexToString($s->get("iv"));
            
            $login = array(
                "email" => mcrypt_decrypt(MCRYPT_3DES, $k, hexToString($email), 
                                          MCRYPT_MODE_CBC, $iv),
                "senha" => mcrypt_decrypt(MCRYPT_3DES, $k, hexToString($senha), 
                                          MCRYPT_MODE_CBC, $iv),
            );
            
            $rsp = $c->login($login, $s);
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
                $s = Container::getSession();
                
                $k = safeHexToString($s->get("key"));
                $iv = safeHexToString($s->get("iv"));

                $em = Container::gerEntityManager();
                $mc = new ControleMensagem($em);
                $rp = $em->getRepository('Models\Usuario');
                $u = $rp->findBy(["usId" => $userID]);
                $user = $u[0];
                $msg = new Mensagem();
                $decrypted = mcrypt_decrypt(
                                MCRYPT_3DES, 
                                $k, 
                                hexToString($txtmsg), 
                                MCRYPT_MODE_CBC, 
                                $iv
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
