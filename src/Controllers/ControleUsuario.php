<?php
namespace Controllers;

require_once __DIR__ . '/../Library/cypher3des.php';

use Doctrine\ORM\EntityManager;
use Models\Usuario;
use Models\Mensagem;
use Library\Sessao;
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
        
        if(!($user instanceof Usuario)){
            echo "Email não encontrado";
        } elseif ($user->getSenha() !== $senha) {
            echo "Senha incorreta.";
        } elseif ($user->getVerificado() === 0) {
            echo "Seu email ainda não foi validado.";
        } else {
            $udata["id"] = $user->getUsId();
            $udata["apelido"] = $user->getApelido();
            $udata["nome"] = $user->getNome() . " " . $user->getSobrenome();
            $s->set("usuario", $udata);
            $mc = new ControleMensagem($this->em);
            $msg = new \Models\Mensagem();
            $mc->enviar($msg, $user, "Entrou no chat");
            return true;
        }
    }
}
