<?php

namespace App\Controllers;

use App\Lib\Sessao;

class ServicosController extends Controller {

 public function index() {
        $css = null;
         $js = '<script type="text/javascript" src="'. JSSITE .'script.js"></script>';

        $this->render("home/servicos", "Serviços", $css, $js, 3);
        
    }
   
    public function redePluvial() {
        $css = null;
        $js = null;

        $this->render("home/redePluvial", "Rede Pluvial", $css, $js, 3);
    }
      
}
