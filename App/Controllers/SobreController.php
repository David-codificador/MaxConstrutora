<?php

namespace App\Controllers;

use App\Lib\Sessao;

class SobreController extends Controller {

   public function index() {
        $css = null;
        $js = '<script type="text/javascript" src="'. JSSITE .'script.js"></script>';
               
        $this->render("home/sobre", "Sobre", $css, $js, 3);
    }
        
}
