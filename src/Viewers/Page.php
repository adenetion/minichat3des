<?php

namespace Viewers;

use Twig_Environment;

/**
 * Description of Page
 *
 * @author adenilton
 */
abstract class Page {

    /**
     * @var Twig_Environment
     */
    protected $t;
    
    /**
     * @var Array 
     */
    protected $p = [];

    public function __construct(Twig_Environment $te) {
        $this->t = $te;
    }
    
    public abstract function exibir($template);
    
    public abstract function add($label, $value);
}
