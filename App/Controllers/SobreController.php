<?php

namespace App\Controllers;

use App\Lib\Sessao;

class SobreController extends Controller {

    public function index() {
        $css = null;
        $js = '<script type="text/javascript" src="' . JSSITE . 'script.js"></script>';

        $bo = new \App\Models\BO\ServicosBO();

        $servicosIndex = $bo->listarVetor(\App\Models\Entidades\Servicos::TABELA['nome'], ['*'], 6, null, null, [], "rand()");
        $this->setViewParam('servicosIndex', $servicosIndex);

        $this->render("home/sobre", "Sobre", $css, $js, 3);
    }

}
