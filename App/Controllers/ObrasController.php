<?php

namespace App\Controllers;

use App\Lib\Sessao;

class ObrasController extends Controller {

  public function index() {
        $css = null;
         $js = '<script type="text/javascript" src="'. JSSITE .'script.js"></script>';

        $this->render("home/obras", "Obras", $css, $js, 3);
    }
        
}
