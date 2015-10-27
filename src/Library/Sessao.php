<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Library;

/**
 * Description of Sessao
 *
 * @author adenilton
 */
class Sessao {
    //put your code here
    static $instancia;
 
    /**
     * 
     * @return Session
     */
    public static function instanciar() {
 
        if (!self::$instancia) {
            self::$instancia = new Sessao;
        }
 
        return self::$instancia;
    }
 
    public function set($chave, $valor) {
        session_start();
        $_SESSION[$chave] = $valor;
        session_write_close();
    }
 
    public function get($chave) {
        session_start();
        $value = $_SESSION[$chave];
        session_write_close();
        return $value;
    }
 
    public function existe($chave) {
        session_start();
        if (isset($_SESSION[$chave]) && (!empty($_SESSION[$chave]))) {
            session_write_close();
            return true;
        }
        else {
            session_write_close();
            return false;
        }
    }
    
}
