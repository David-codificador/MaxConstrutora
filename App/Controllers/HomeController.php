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
        
        $this->render("home/index", "Início", $css, $js, 3);
    }
    
 }
