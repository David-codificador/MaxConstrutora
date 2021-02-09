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
        $js = '<script type="text/javascript" src="'. JSSITE .'script.js"></script>';
               
        $this->render("home/sobre", "Sobre", $css, $js, 3);
    }
    
    public function servicos() {
        $css = null;
         $js = '<script type="text/javascript" src="'. JSSITE .'script.js"></script>';

        $this->render("home/servicos", "Serviços", $css, $js, 3);
    }
   
    public function obras() {
        $css = null;
         $js = '<script type="text/javascript" src="'. JSSITE .'script.js"></script>';

        $this->render("home/obras", "Obras", $css, $js, 3);
    }
    
    public function contato() {
        $css = null;
         $js = '<script type="text/javascript" src="'. JSSITE .'script.js"></script>';

        $this->render("home/contato", "Contato", $css, $js, 3);
    }
   
 }
