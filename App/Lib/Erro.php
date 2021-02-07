<?php

namespace App\Lib;

use Exception;
use App\Lib\Sessao;
use App\Controllers\Controller;

class Erro extends Controller{
    private $message;
    private $code;

    public function __construct($objetoException = Exception::class){
        $this->code     = $objetoException->getCode();
        $this->message  = $objetoException->getMessage();
    }

    public function exibe(){
        Sessao::gravaMensagem("Erro código: " . $this->code, $this->message, 2);
        if(Sessao::logadoAdministrador()){
            $this->redirect('administrador/');
        }else{
            $this->redirect('home/');
        }
    }
}