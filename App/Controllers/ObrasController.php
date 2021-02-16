<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\Entidades\Canvas;

class ObrasController extends Controller {

  public function index() {
        $css = null;
         $js = '<script type="text/javascript" src="'. JSSITE .'script.js"></script>';

        $this->render("home/obras", "Obras", $css, $js, 3);
    }
    
     public function cadastro() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $css = '';     
        $js = '';
              
        
        $this->render("obras/cadastro", "Cadastro de Obras", $css, $js, 1);
        Sessao::limpaFormulario();
    }
    
     public function inserir() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $bo = new \App\Models\BO\ObrasBO();
        $vetor = $_POST;
        $dados = array();
        $campus = \App\Models\Entidades\Obras::CAMPOS;

        Sessao::gravaFormulario($vetor);

        foreach ($vetor as $indice => $valor) {
            if (in_array($indice, $campus)) {
                if ($vetor[$indice] == '') {
                    $dados[$indice] = "null";
                } else {
                    $dados[$indice] = $vetor[$indice];
                }
            }
        }

        $dados['data_cadastro'] = date("Y-m-d H:i:s");
        $dados['administrador_id'] = Sessao::getAdministrador('id');

        if ($_FILES["imagem"]["name"] != "") {
            $tmp_nome = $_FILES["imagem"]['tmp_name'];
            $nome_envio = $_FILES["imagem"]['name'];

            $ext = strtolower(strrchr($nome_envio, "."));

            $nome = date('d_m_Y_h_i_s') . "_" . rand(111, 999) . $ext;

            //Fazer o Upload
            move_uploaded_file($tmp_nome, './public/imagemSite/obras/' . $nome);
            if (file_exists('./public/imagemSite/obras/' . $nome)) {

                $img = new Canvas();

                $img->carrega('./public/imagemSite/obras/' . $nome)
                        ->hexa('#FFFFFF')
                        ->redimensiona(450, 300, 'preenchimento')
                        ->grava('./public/imagemSite/obras/' . $nome, 80);

                $dados['imagem'] = $nome;
            } else {
                Sessao::gravaMensagem("Falha ao enviar foto", "Imagem não enviada", 2);
                $this->redirect('obras/cadastro');
            }
        } else {
            Sessao::gravaMensagem("Erro", "Selecione uma imagem", 3);
            $this->redirect('obras/cadastro');
        }

        
        $id = $bo->inserir(\App\Models\Entidades\Obras::TABELA['nome'], $dados, \App\Models\Entidades\Obras::CAMPOSINFO);
        
        if ($id == FALSE) {
            if (!Sessao::existeMensagem()) {
                Sessao::gravaMensagem("Falha", "Verifique todos os campos e tente novamente", 2);
            }

            $this->redirect('obras/cadastro');
        } else {

            $dados['categoria'] = $this->categoria($vetor['categoria']);
            unset($dados['data_cadastro']);
            unset($dados['administrador_id']);
            unset($dados['imagem']);

            $x = '';
            foreach ($dados as $indice => $value) {
                if ($value != "null") {
                    $x .= "campo " . \App\Models\Entidades\Obras::CAMPOSINFO[$indice]['descricao'] . ": " . $value . "<br>";
                }
            }
            $x .= '<img src="'.IMAGEMSITE.'obras/'.$nome.'" style="width: 100%">';

            $info = [
                'tipo' => 1,
                'administrador' => Sessao::getAdministrador('id'),
                'campos' => $x,
                'tabela' => \App\Models\Entidades\Obras::TABELA['descricao'],
                'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou o cadastro de um nova obra.'
            ];

            $this->inserirAuditoria($info);

            Sessao::limpaFormulario();
            Sessao::gravaMensagem("Sucesso", "Obra inserida", 1);

            $this->redirect('obras/cadastro');
        }
    }    
    
        public function categoria($categoria){
        switch ($categoria) {
            case 1:
                return "Construção civil";
                break;
            case 2:
                return "Meio Fio";
                break;
            case 3:
                return "Sarjeta";
                break;
            case 4:
                return "Rede Pluvial";
                break;
            case 5:
                return "Rede Esgoto";
                break;
            default:
                return "Outros";
                break;
        }
    }
        
}


