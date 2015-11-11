<?php
namespace Controllers;

require_once __DIR__ . '/../Library/cypher3des.php';

use Doctrine\ORM\EntityManager;
use Models\Usuario;
use Models\Mensagem;
use Library\Sessao;
use Library\Container;
use Controllers\ControleMensagem;


/**
 * Description of ControleUsuario
 *
 * @author adenilton
 */
class ControleUsuario{
    //put your code here
    protected $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }


    public function cadastrar(Usuario $u, array $dados) {
        
        extract($dados);
        
        $u->setEmail($email);
        $u->setNome($nome);
        $u->setSobrenome($sobrenome);
        $u->setApelido($apelido);
        $u->setSenha($senha);
        $u->setCadkey($cadkey);
        $u->setCadiv($cadiv);
        
        try {
            $this->em->persist($u);
            $this->em->flush();
            echo "Usuario Cadastrado com sucesso";
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function login(array $dados, Sessao $s) {
        extract($dados);
        
        $repository = $this->em->getRepository('Models\Usuario');
        
        $u = $repository->findBy(["email" => $email]);
        
        $user = $u[0];
        
        $k = base64_decode($user->getCadkey());
        $iv = base64_decode($user->getCadiv());
        
        $pass = stringToHex(mcrypt_encrypt(MCRYPT_3DES, $k, $senha, MCRYPT_MODE_CBC, $iv));
        
        if(!($user instanceof Usuario)){
            echo "Email não encontrado";
        } elseif ($user->getSenha() !== $pass) {
            echo "Senha incorreta.";
        } elseif ($user->getVerificado() === 0) {
            echo "Seu email ainda não foi validado.";
        } else {
            $udata["id"] = $user->getUsId();
            $udata["apelido"] = $user->getApelido();
            $udata["nome"] = $user->getNome() . " " . $user->getSobrenome();
            $s->set("usuario", $udata);
            $mc = new ControleMensagem($this->em);
            $msg = new Mensagem();
            $mc->enviar($msg, $user, "Entrou no chat");
            return true;
        }
    }
}
