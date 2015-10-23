<?php
namespace Controllers;

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
    }
    
    public function login(array $dados) {
        extract($dados);
        
        $repository = $this->em->getRepository('Models\Usuario');
        
        $u = $repository->findBy(["email" => $email]);
        //print_r($u);
        if(!empty($u) && ($u[0]->getSenha() === $senha)){
            return true;
        } else {
            echo "Email não encontrado ou senha incorreta.";
        }
    }
}
