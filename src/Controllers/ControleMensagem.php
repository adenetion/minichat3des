<?php

namespace Controllers;

require_once __DIR__ . '/../Library/cypher3des.php';

use Doctrine\ORM\EntityManager;
use Models\Mensagem;
use Models\Usuario;


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
        //$dql = 'SELECT m, u FROM Mensagem m JOIN u.usId ORDER BY m.dataTs DESC';
        //'SELECT m FROM Models\Mensagem m ORDER BY m.data_ts DESC'
        
//        $messages = $this->em->getRepository('Models\Mensagem')
//                ->createQueryBuilder('m')
//                ->select('m')
//                ->orderBy('m.dataTs', 'DESC')
//                ->getQuery()
//                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        
        $messages = $this->em->createQuery('SELECT m, u.apelido FROM Models\Mensagem m JOIN m.usuario u ORDER BY m.dataTs DESC')
                ->setMaxResults(10)
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        
        
        $json_str = file_get_contents("/var/www/minichat3des/public/js/srp.json");
        $jsrc = json_decode($json_str, true);
        extract($jsrc);
        
        foreach ($messages as $msg) {
            $item = [
                "nick" => trim($msg["apelido"]),
                "mensagem" => $msg[0]["conteudo"],
                "hora" => $msg[0]["dataTs"]->format('h:i:s')
            ];
            $resp[] = $item;
        }
        print_r($resp);
        echo json_encode($resp);
        return TRUE;
    }
}
