<?php

namespace App\Controllers;

use App\Lib\Sessao;

class ServicosController extends Controller {

    public function index() {
        $css = null;
        $js = '<script type="text/javascript" src="' . JSSITE . 'script.js"></script>';
// Aqui colocar a paginação da parte de serviços!
        $bo = new \App\Models\BO\ServicosBO();

        $condicao = "";
        $valoresCondicao = [];

        $orderBy = "titulo asc";

        $tabela = \App\Models\Entidades\Servicos::TABELA['nome'];

        $resultado = $bo->listarVetor($tabela, ["*"], null, null, $condicao, $valoresCondicao, $orderBy);

        $this->setViewParam('servicos', $resultado);



        $this->render("home/servicos", "Serviços", $css, $js, 3);
    }

    // public function redePluvial() {
    //    $css = null;
    //   $js = null;
    //   $this->render("home/redePluvial", "Rede Pluvial", $css, $js, 3);
    //}

    public function cadastro() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $css = '';
        $js = '<script src="' . JSTEMPLATE . 'ckeditor/ckeditor.js"></script>';


        $this->render("servicos/cadastro", "Cadastro de Servicos", $css, $js, 1);
        Sessao::limpaFormulario();
    }

    public function inserir() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $bo = new \App\Models\BO\ServicosBO();
        $vetor = $_POST;
        $dados = array();
        $campus = \App\Models\Entidades\Servicos::CAMPOS;

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

        $dados['administrador_id'] = Sessao::getAdministrador('id');


        $id = $bo->inserir(\App\Models\Entidades\Servicos::TABELA['nome'], $dados, \App\Models\Entidades\Servicos::CAMPOSINFO);

        if ($id == FALSE) {
            if (!Sessao::existeMensagem()) {
                Sessao::gravaMensagem("Falha", "Verifique todos os campos e tente novamente", 2);
            }

            $this->redirect('servicos/cadastro');
        } else {
            unset($dados['administrador_id']);



            $x = '';
            foreach ($dados as $indice => $value) {
                if ($value != "null") {
                    $x .= "campo " . \App\Models\Entidades\Servicos::CAMPOSINFO[$indice]['descricao'] . ": " . $value . "<br>";
                }
            }
            $info = [
                'tipo' => 1,
                'administrador' => Sessao::getAdministrador('id'),
                'campos' => $x,
                'tabela' => \App\Models\Entidades\Servicos::TABELA['servicos'],
                'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou o cadastro de um novo Servico'
            ];

            $this->inserirAuditoria($info);

            Sessao::limpaFormulario();
            Sessao::gravaMensagem("Sucesso", "Serviço inserido", 1);

            $this->redirect('servicos/listar');
        }
    }

    public function listar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $css = ' ';
        $js = '';



        $bo = new \App\Models\BO\ServicosBO();

        if (!is_numeric($parametro[0])) {
            $this->redirect('servicos/listar/1/' . $parametro[0]);
        }
        $p = (isset($parametro[0]) or is_numeric($parametro[0])) ? $parametro[0] : 1;
        $busca = (isset($parametro[1])) ? $parametro[1] : null;

        $quantidade = 10;
        $pagina = $p * $quantidade - $quantidade;

        $condicao = "";
        $valoresCondicao = [];

        if ($busca) {
            $condicao .= "titulo like '%?%'";
            array_push($valoresCondicao, "$busca");
        }

        $orderBy = "titulo asc";

        $tabela = \App\Models\Entidades\Servicos::TABELA['nome'];

        $resultado = $bo->listarVetor($tabela, ["*"], $quantidade, $pagina, $condicao, $valoresCondicao, $orderBy);
        $this->setViewParam('servicos', $resultado);

        $quanServicos = $bo->selecionar($tabela, ["count(id) as id"], $condicao, $valoresCondicao, $orderBy);

        $quanPaginas = ceil($quanServicos->getId() / $quantidade);

        if ($p > $quanPaginas and $p != 1) {
            Sessao::gravaMensagem("Falha", "Página não encontrada", 2);
            $this->redirect('avisos/listar');
        }

        if ($p < 5) {
            $i = 0;
            $fim = $quanPaginas < 5 ? $quanPaginas : 5;
        } else {
            if ($p < $quanPaginas - 2) {
                $i = $p - 3;
                $fim = $p + 2;
            } else {
                $i = $quanPaginas - 5;
                $fim = $quanPaginas;
            }
        }

        $paginacao = array(
            'quanServicos' => $quanServicos->getId(),
            'quanPaginas' => $quanPaginas,
            'inicio' => $i,
            'fim' => $fim,
            'pagina' => $p,
            'anterior' => $p - 1,
            'proxima' => $p + 1,
            'busca' => $busca
        );

        $this->setViewParam('paginacao', $paginacao);

        if ($quanServicos->getId() < 1) {
            Sessao::gravaMensagem('', 'Nenhum registro encontrado!', 2);
        }

        $this->render('servicos/listar', "Listagem", $css, $js, 1);
    }

    public function tipoAjax() {
        $bo = new \App\Models\BO\ServicosBO();

        $lista = $bo->listarVetor(\App\Models\Entidades\Servicos::TABELA['nome'], ['id', 'tipo_servico'], null, null, '', [], '');

        if ($lista) {
            $retorno = [
                'status' => 1,
                'msg' => 'Serviços encontrados!',
                'retorno' => $lista
            ];
        } else {
            $retorno = [
                'status' => 0,
                'msg' => 'Serviços não encontrados!'
            ];
        }

        echo json_encode($retorno);
        exit();
    }

    public function buscarInfo() {
        if (isset($_POST['id']) and is_numeric($_POST['id'])) {


            $bo = new \App\Models\BO\ServicosBO();

            $item = $bo->selecionarVetor(\App\Models\Entidades\Servicos::TABELA['nome'], ['*'], 'id = ?', [$_POST['id']], '');

            if ($item) {
                $retorno = [
                    'status' => 1,
                    'msg' => 'Serviço encontrado!',
                    'retorno' => $item
                ];
            } else {
                $retorno = [
                    'status' => 0,
                    'msg' => 'Serviço não encontrado!'
                ];
            }
        } else {
            $retorno = [
                'status' => 0,
                'msg' => 'Parametros Incorretos!'
            ];
        }
        echo json_encode($retorno);
        exit();
    }

}
