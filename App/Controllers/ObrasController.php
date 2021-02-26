<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\Entidades\Canvas;

class ObrasController extends Controller {

    public function index() {
        $css = null;
        $js = '<script type="text/javascript" src="' . JSSITE . 'script.js"></script>';

        $bo = new \App\Models\BO\ObrasBO();
        $obras = $bo->listarVetor(\App\Models\Entidades\Obras::TABELA['nome'], ['*'], null, null, null, [], "id desc");

        $this->setViewParam('obras', $obras);
        
        
        // chamar obras no footer
        $servicosIndex = $bo->listarVetor(\App\Models\Entidades\Servicos::TABELA['nome'], ['*'], 6, null, null, [], "rand()");
        $this->setViewParam('servicosIndex', $servicosIndex);
        
        
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
            $x .= '<img src="' . IMAGEMSITE . 'obras/' . $nome . '" style="width: 100%">';

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

            $this->redirect('obras/listar');
        }
    }

    public function listar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $css = '';
        $js = '';

        $bo = new \App\Models\BO\ObrasBO();

        if (!is_numeric($parametro[0])) {
            $this->redirect('obras/listar/1/' . $parametro[0]);
        }
        $p = (isset($parametro[0]) or is_numeric($parametro[0])) ? $parametro[0] : 1;
        $busca = (isset($parametro[1])) ? $parametro[1] : null;

        $quantidade = 12;
        $pagina = $p * $quantidade - $quantidade;

        $condicao = "";
        $valoresCondicao = [];

        if ($busca) {
            $condicao .= " titulo like '%?%'";
            array_push($valoresCondicao, "$busca");
        }

        $orderBy = "id desc";

        $tabela = \App\Models\Entidades\Obras::TABELA['nome'];

        $resultado = $bo->listarVetor($tabela, ["*"], $quantidade, $pagina, $condicao, $valoresCondicao, $orderBy);

        $this->setViewParam('obras', $resultado);

        $quanObras = $bo->selecionar($tabela, ["count(id) as id"], $condicao, $valoresCondicao, $orderBy);

        $quanPaginas = ceil($quanObras->getId() / $quantidade);

        if ($p > $quanPaginas and $p != 1) {
            Sessao::gravaMensagem("Falha", "Página não encontrada", 2);
            $this->redirect('obras/listar');
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
            'quanObras' => $quanObras->getId(),
            'quanPaginas' => $quanPaginas,
            'inicio' => $i,
            'fim' => $fim,
            'pagina' => $p,
            'anterior' => $p - 1,
            'proxima' => $p + 1,
            'busca' => $busca
        );

        $this->setViewParam('paginacao', $paginacao);

        if ($quanObras->getId() < 1) {
            Sessao::gravaMensagem('', 'Nenhum registro encontrado!', 2);
        }

        $this->render('obras/listar', "Listagem de Obras", $css, $js, 1);
    }

    public function excluir($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $id = $parametro[0];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\ObrasBO();
            $tabela = \App\Models\Entidades\Obras::TABELA['nome'];

            $resposta = $bo->excluir($tabela, "id = ?", [$id], 1);

            if ($resposta) {
                unlink('./public/imagemSite/obras/' . $resposta['imagem']);

                Sessao::gravaMensagem("Sucesso", "Obra Excluida", 1);

                $info = [
                    'tipo' => 3,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => "-",
                    'tabela' => \App\Models\Entidades\Obras::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a exclusão de uma imagem da obra: ' . $this->categoria($resposta['categoria'])
                ];

                $this->inserirAuditoria($info);
            } else {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Obra não excluida", 2);
                }
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('obras/listar');
    }

    public function editar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $id = $parametro[0];

        if (is_numeric($id)) {

            $bo = new \App\Models\BO\ObrasBO();
            $obras = $bo->selecionarVetor(\App\Models\Entidades\Obras::TABELA['nome'], ['*'], "id = ?", [$id], null);

            if ($obras) {

                $css = '';
                $js = '';



                $this->setViewParam('item', $obras);

                $this->render('obras/editar', $this->categoria($obras['categoria']), $css, $js, 1);
            } else {
                Sessao::gravaMensagem("Falha", "Tipo de obras não encontrada", 2);
                $this->redirect('obras/listar');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
            $this->redirect('obras/listar');
        }
    }

    public function salvar() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);
        $id = $_POST['obras'];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\ObrasBO();

            $vetor = $_POST;

            $dados = array();
            $campus = \App\Models\Entidades\Obras::CAMPOS;

            foreach ($vetor as $indice => $valor) {
                if (in_array($indice, $campus)) {
                    if ($vetor[$indice] == '') {
                        $dados[$indice] = "null";
                    } else {
                        $dados[$indice] = $vetor[$indice];
                    }
                }
            }

            $resultado = $bo->editar(\App\Models\Entidades\Obras::TABELA['nome'], $dados, "id = ?", [$id], 1, \App\Models\Entidades\Obras::CAMPOSINFO);
            
            if (Sessao::existeMensagem() or $resultado == FALSE) {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem($vetor['descricao'], "Obra sem edição", 2);
                }

                $this->redirect('obras/listar');
            } else {
                $dados['categoria'] = $this->categoria($vetor['categoria']);
                $resultado['categoria'] = $this->categoria($resultado['categoria']);

                $x = '';

                foreach ($dados as $indice => $value) {
                    if ($value == 'null') {
                        $value = '';
                    }

                    if ($resultado[$indice] != $value) {
                        $x .= "campo " . \App\Models\Entidades\Obras::CAMPOSINFO[$indice]['descricao'] . ' editado de: "' . $resultado[$indice] . '" para "' . $value . '"<br>';
                    }
                }

                $info = [
                    'tipo' => 2,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => $x,
                    'tabela' => \App\Models\Entidades\Obras::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a edição das informações de uma Obra.'
                ];

                $this->inserirAuditoria($info);

                Sessao::gravaMensagem("Sucesso", "Obra " . $resultado['titulo'] . ", editada", 1);

                $this->redirect('obras/listar');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('obras/listar');
    }

    public function categoria($categoria) {
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
            case 6:
                return "Reservatório";
                break;
            case 7:
                return "Elevatória de Esgoto";
                break;
            default:
                return "Outros";
                break;
        }
    }

}
