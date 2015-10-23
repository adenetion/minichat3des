<?php

namespace Controllers;

require_once __DIR__ . '/../Library/cypher3des.php';

use Respect\Rest\Router;

use Controllers\ControleUsuario;
use Models\Usuario;
use Library\Container;
use Viewers\Inicial;
/**
 * Description of ControleRota
 *
 * @author adenilton
 */
class ControleRota {
    
    protected $router;
    
    public function __construct() {
        $myRouter = Container::getRouter();
        $this->postCadUser();
        $this->pageDefault($myRouter);
        $this->pageChat($myRouter);
    }

    public function pageChat(Router $r) {
        $r->get("/chat", function() {
            $fs = Container::getTwigLoderFileSystem(__DIR__ . "/../../public/");
            $options = ["auto_reload" => true];
            $twig = Container::getTwigEnvironment($fs, $options);
            $index = new Inicial($twig);
            $index->exibir('chat.html');
        });
    }
    
    public function pageDefault(Router $r) {
        $r->get("/", function() {
            $fs = Container::getTwigLoderFileSystem(__DIR__ . "/../../public/");
            $options = ["auto_reload" => true];
            $twig = Container::getTwigEnvironment($fs, $options);
            $index = new Inicial($twig);
            $index->exibir('default.html');
        });
    }
    
    public function postCadUser(Router $r) {
        $r = new Router;
        $r->post('/ajax/ControleUsuario/cadastrar/**', function($uinfo){
            
            
            // lê o conteúdo do arquivo para uma string
            $json_str = file_get_contents("/var/www/minichat3des/public/js/srp.json");
            $jsrc = json_decode($json_str, true);
            extract($jsrc);
            
            $ud = array(
                "email" => mcrypt_decrypt(MCRYPT_3DES, $k, hexToString($uinfo[0]), MCRYPT_MODE_CBC, hexToString($iv)),
                "nome" => mcrypt_decrypt(MCRYPT_3DES, $k, hexToString($uinfo[1]), MCRYPT_MODE_CBC, hexToString($iv)),
                "sobrenome" => mcrypt_decrypt(MCRYPT_3DES, $k, hexToString($uinfo[2]), MCRYPT_MODE_CBC, hexToString($iv)),
                "apelido" => mcrypt_decrypt(MCRYPT_3DES, $k, hexToString($uinfo[3]), MCRYPT_MODE_CBC, hexToString($iv)),
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
        $r = new Router;
        $r->post('/ajax/ControleUsuario/login/*/*', function($email, $senha) {
            $em = Container::gerEntityManager();
            $c = new ControleUsuario($em);
            $c->login(["email" => $email, "senha" => $senha]);
        });        
    }
}
