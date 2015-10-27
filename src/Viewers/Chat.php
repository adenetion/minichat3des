<?php

namespace Viewers;

use Viewers\Page;

/**
 * Description of Chat
 *
 * @author adenilton
 */
class Chat extends Page {
    //put your code here
    
    public function __construct(\Twig_Environment $e) {
        parent::__construct($e);
    }
    
    /**
     * Renderiza o Template passado como parâmetro
     * @param string $template
     * @return void
     */
    public function exibir($template) {
        if(!empty($this->p)){
            $this->t->display($template, $this->p);
        } else {
            $this->t->display($template);
        }
    }
    
    /**
     * Adiciona variáveis aos parâmetros
     * que são mostrados no template
     * @param string $label
     * @param string or array $value
     */
    public function add($label, $value) {
        $this->p[$label] = $value;
    }
}
