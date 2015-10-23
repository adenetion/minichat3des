<?php
namespace Traits;

trait SendMail {
    
    /**
     * Retorna uma string com os parâmetros email e alias no estilo get url
     * @param string $email
     * @param string $alias
     * @return string
     */
    function setMailUrl($email, $alias) {
        return sprintf('email=%s&alias=%s', $email, $alias);
    }
}