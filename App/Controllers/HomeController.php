<?php

namespace App\Controllers;

use App\Lib\Sessao;

class HomeController extends Controller {

    public function index() {
        $css = null;
        $js = null;

        $this->render("home/index", "Início", $css, $js, 3);
    }

}
