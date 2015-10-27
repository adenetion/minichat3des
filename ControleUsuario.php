<?php
namespace Controllers;

require_once __DIR__ . '/../Library/cypher3des.php';

use Doctrine\ORM\EntityManager;
use Models\Usuario;


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
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
        $json_str = file_get_contents("/var/www/minichat3des/public/js/srp.json");
        $jsrc = json_decode($json_str, true);
        extract($jsrc);
        
        $nome_completo = $nome . " " . $sobrenome;
        
        $url = "http://minichat3des.org/ControleUsuario/validar/"
             . mcrypt_encrypt(MCRYPT_3DES, $k, $email, MCRYPT_MODE_CBC, $iv)
             . "/"
             . mcrypt_encrypt(MCRYPT_3DES, $k, $nome_completo, MCRYPT_MODE_CBC, $iv) 
             . "/" . PHP_EOL 
             . mcrypt_encrypt(MCRYPT_3DES, $k, $apelido, MCRYPT_MODE_CBC, $iv);
        
        $message = "Olá {$nome} {$sobrenome}," . PHP_EOL . PHP_EOL 
                 . "Para completar seu cadastro acesso o link:" . PHP_EOL . $url
                 . PHP_EOL . PHP_EOL 
                 . "Obrigado," . PHP_EOL
                 . "Equipe MiniChat3DES";
        
         mail($email, "Confirmação de cadastro", $message);
         
         echo "Falta pouco, acesse seu email e confirme seu cadastro.";
    }
    
    public function login(array $dados) {
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
            return true;
        }
    }
    
    public function validar(array $dados) {
        extract($dados);
        
        $repository = $this->em->getRepository('Models\Usuario');
        
        //array for search
        $sa["email"] = $email;
        $sa["nome"] = $nome;
        $sa["sobrenome"] = $sobrenome;
        $sa["apelido"] = $apelido;
        
        $u = $repository->findBy($sa);
        
        $user = $u[0];
    }
}
