<?php

namespace App\Controllers;

use App\Lib\Sessao;

abstract class Controller {

    protected $app;
    private $viewVar;

    public function __construct($app) {
        $this->setViewParam('nameController', $app->getControllerName());
    }

    public function render($view, $titulo = null, $css = null, $js = null, $menu = 1) {
        $viewVar = $this->getViewVar();

        $Sessao = Sessao::class;

        if (trim($titulo) != '') {
            $titulo = " | " . $titulo;
        }

        if ($menu != 3) {

            $arquivoCSS = '<link href="' . CSS . 'estilo.css" type="text/css" rel="stylesheet"/>';
            if (file_exists("./public/css/" . $view . ".css")) {

                $arquivoCSS .= '<link href="' . CSS . $view . '.css" type="text/css" rel="stylesheet"/>';
            }
            $arquivoJS = '<script src="' . JS . 'ini.js"></script>';
            if (file_exists("./public/js/" . $view . ".js")) {
                $arquivoJS .= '<script src="' . JS . $view . '.js"></script>';
            }
            require_once PATH . '/App/Views/layouts/header.php';

            if ($menu == 1) {
                require_once PATH . '/App/Views/layouts/menu_administrador.php';
            } else if ($menu == 2) {
                require_once PATH . '/App/Views/layouts/menu.php';
            }

            require_once PATH . '/App/Views/' . $view . '.php';
            require_once PATH . '/App/Views/layouts/footer.php';
        } else {

            $arquivoCSS = '<link href="' . CSSSITE . 'style.css" type="text/css" rel="stylesheet"/>';

            if (file_exists("./public/cssSite/" . $view . ".css")) {
                $arquivoCSS .= '<link href="' . CSSSITE . $view . '.css" type="text/css" rel="stylesheet"/>';
            }

            if (file_exists("./public/jsSite/" . $view . ".js")) {
                $arquivoJS = '<script src="' . JSSITE . $view . '.js"></script>';
            } else {
                $arquivoJS = null;
            }

            require_once PATH . '/App/Views/layoutsSite/header.php';
            require_once PATH . '/App/Views/layoutsSite/menu.php';
            require_once PATH . '/App/Views/' . $view . '.php';
            require_once PATH . '/App/Views/layoutsSite/footer.php';
        }
    }

    public function redirect($view) {
        header('Location: ' . LINK . $view);
        exit;
    }

    public function getViewVar() {
        return $this->viewVar;
    }

    public function setViewParam($varName, $varValue) {
        if ($varName != "" && $varValue != "") {
            $this->viewVar[$varName] = $varValue;
        }
    }

    public function enviar_email() {
        
    }

    public function remover_caracter($string) {
        $string = str_replace(" ", "_", preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($string))));
        $string = str_replace("+", "_", $string);
        return $string;
    }

    public function status($status) {
        switch ($status) {
            case 1:
                return 'Ativo';
                break;
            case 2:
                return 'Desativado';
                break;
            case 0:
                return 'Excluido';
                break;

            default:
                return 'Outros';
                break;
        }
    }

    public function validaAdministrador($tempo = 300) {
        if (Sessao::logadoAdministrador()) {
            header('Refresh: ' . $tempo . '; URL=' . LINK . 'administrador/sair');
        } else {
            Sessao::gravaMensagem('Faça Login com suas credenciais.', "Acesso não permitido!", 3);
            $this->redirect('administrador/acesso');
        }
    }

    public function nivelAcesso($nivel, $caminho = 'administrador') {
        if (!in_array($nivel, Sessao::getAdministrador('permissao'))) {
            Sessao::gravaMensagem("Nível de permissão " . $nivel . ' requerido.', "Você não tem permissão para acessar esse conteúdo!", 3);
            $this->redirect($caminho);
        }
    }

    public function inserirAuditoria($dados) {
        /*
         * 1 - Insert
         * 2 - Update
         * 3 - Delete
         * 4 - Select
         * 5 - Login
         * 6 - Logoff
         * 7 - Envio de E-mail
         */
        $bo = new \App\Models\BO\AuditoriaBO();

        if (Sessao::logadoAdministrador()) {
            $dados['administrador'] = Sessao::getAdministrador('id');
        } else {
            $dados['administrador'] = null;
        }

        $dados['data'] = date("Y-m-d H:i:s");
        $dados['ip'] = $_SERVER["REMOTE_ADDR"];

        return $bo->inserir(\App\Models\Entidades\Auditoria::TABELA['nome'], $dados, \App\Models\Entidades\Auditoria::CAMPOSINFO);
    }

    public function upload($arquivo, $caminho, $nome = false, $tamanho = 10, $tipo = []) {
        if ($arquivo['name'] == '') {
            return false;
        }

        if ($caminho == '') {
            return false;
        }

        if (!$nome) {
            $nome = date('dmyhis') . rand(100, 999);
        }

        $ext = strtolower(strrchr($arquivo['name'], "."));

        if ($ext != '') {
            if(count($tipo) > 0) {
                if (!in_array($ext, $tipo)) {
                    return false;
                }
            }
            
            if($tamanho < $arquivo['size'] / 1000000){
                return false;
            }
            
            $nome = $nome . $ext;
            
            move_uploaded_file($arquivo['tmp_name'], $caminho . $nome);
            
            if(file_exists($caminho . $nome)){
                return $nome;
            }
            
            return false;
        } else {
            return false;
        }

        return $ext;
    }

}
