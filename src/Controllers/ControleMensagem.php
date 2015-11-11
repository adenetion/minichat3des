<?php

namespace Controllers;

require_once __DIR__ . '/../Library/cypher3des.php';

use Doctrine\ORM\EntityManager;
use Models\Mensagem;
use Models\Usuario;
use Library\Container;


/**
 * Description of ControleMensagem
 *
 * @author adenilton
 */
class ControleMensagem {
    /**
     *
     * @var EntityManager
     */
    protected $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    
    /**
     * 
     * @param int $user ID do Usuario
     * @param string $textmsg Texto da Mensagem
     * @param string $dh Datetime format Y-d-m h:i:s
     * @return boolean
     */
    public function enviar(Mensagem $m, Usuario $user, $textmsg) {
        $m->setUsuario($user);
        $m->setConteudo($textmsg);
        $data = date('Y-d-m h:i:s');
        $agora = \DateTime::createFromFormat('Y-d-m h:i:s', $data);
        $m->setDataTs($agora);
        
        $this->em->persist($m);
        $this->em->flush();
        return true;
    }
    
    
    public function listar() {
        $dql = 'SELECT m, u.apelido FROM Models\Mensagem m '
             . 'JOIN m.usuario u ORDER BY m.dataTs DESC';
        $messages = $this->em->createQuery($dql)->setMaxResults(10)
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        
        
        $s = Container::getSession();
        $k = $s->get("key");
        $iv = $s->get("iv");
        
        foreach ($messages as $msg) {
            $encrypted = mcrypt_encrypt(
                            MCRYPT_3DES,
                            safeHexToString($k),
                            trim($msg[0]["conteudo"]),
                            MCRYPT_MODE_CBC,
                            safeHexToString($iv)
                         );
            $item = [
                "nick" => trim($msg["apelido"]),
                "mensagem" => stringToHex($encrypted),
                "hora" => $msg[0]["dataTs"]->format('d/m/y H:i:s')
            ];
            $resp[] = $item;
        }
        
        echo json_encode($resp, JSON_UNESCAPED_UNICODE);
        return "";
    }
}
