<?php

namespace App\Controllers;

use App\Lib\Sessao;

class HomeController extends Controller {

    public function index() {
        $css = null;
        $js = null;

        $bo = new \App\Models\BO\BannerBO();

        $banner = $bo->listarVetor(\App\Models\Entidades\Banner::TABELA['nome'], ['*'], null, null, "status = ?", [1], '');
        $this->setViewParam('banner', $banner);

        $bo = new \App\Models\BO\ObrasBO();

        $obras = $bo->listarVetor(\App\Models\Entidades\Obras::TABELA['nome'], ['*'], 6, null, null, [], "id desc");
        $this->setViewParam('obras', $obras);

        $bo = new \App\Models\BO\ServicosBO();

        $servicos = $bo->listarVetor(\App\Models\Entidades\Servicos::TABELA['nome'], ['*'], 3, null, null, [], "rand()");
        $this->setViewParam('servicos', $servicos);

                
        $this->render("home/index", "Início", $css, $js, 3);
    }

}
