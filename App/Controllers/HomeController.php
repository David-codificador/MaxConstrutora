<?php

namespace App\Controllers;

use App\Lib\Sessao;

class HomeController extends Controller {

    public function index() {
        $css = null;
        $js = null;

        $this->render("home/index", "Início", $css, $js, 3);
    }
    
    public function sobre() {
        $css = null;
        $js = null;

        $this->render("home/sobre", "Sobre", $css, $js, 3);
    }
    
    public function servicos() {
        $css = null;
        $js = null;

        $this->render("home/sobre", "Sobre", $css, $js, 3);
    }

}
