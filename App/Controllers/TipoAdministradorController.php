<?php

namespace App\Controllers;

use App\Lib\Sessao;

class TipoAdministradorController extends Controller {

    public function index() {
        $this->redirect("tipoAdministrador/listar");
    }

    public function cadastro() {
        $this->validaAdministrador();
        $this->nivelAcesso(1);

        $css = '
            <link rel="stylesheet" href="' . CSSTEMPLATE . '/switchery/switchery.min.css" >
        ';

        $js = '
         <script src="' . JSTEMPLATE . 'switchery/switchery.min.js"></script>
        ';

        $bo = new \App\Models\BO\PermissaoBO();

        $lista = $bo->listarVetor(\App\Models\Entidades\Permissao::TABELA['nome'], ['*'], null, null, "status = ?", [1], "nivel asc");
        $this->setViewParam("lista", $lista);

        if (!isset($_SESSION['form']['permissao']) or $_SESSION['form']['permissao'] == '') {
            $_SESSION['form']['permissao'] = [];
        }

        $this->render("tipoAdministrador/cadastro", "Cadastro de tipo de administrador", $css, $js, 1);
        //Sessao::limpaFormulario();
    }

    public function inserir() {
        $this->validaAdministrador();
        $this->nivelAcesso(1);

        $bo = new \App\Models\BO\TipoAdministradorBO();

        $vetor = $_POST;
        Sessao::gravaFormulario($vetor);
        $dados = array();
        $campus = \App\Models\Entidades\TipoAdministrador::CAMPOS;


        if (!isset($vetor['permissao']) or count($vetor['permissao']) < 1) {
            Sessao::gravaMensagem("Falha", "É necessário selecionar no mínimo 1 permissão!", 2);
            $this->redirect('tipoAdministrador/cadastro/');
        }

        if ($vetor['status'] == "on") {
            $vetor['status'] = 1;
        } else {
            $vetor['status'] = 2;
        }

        foreach ($vetor as $indice => $valor) {
            if (in_array($indice, $campus)) {
                if ($vetor[$indice] == '') {
                    $dados[$indice] = "null";
                } else {
                    $dados[$indice] = $vetor[$indice];
                }
            }
        }

        $id = $bo->inserir(\App\Models\Entidades\TipoAdministrador::TABELA['nome'], $dados, \App\Models\Entidades\TipoAdministrador::CAMPOSINFO);

        if ($id == FALSE) {
            if (!Sessao::existeMensagem()) {
                Sessao::gravaMensagem("Falha", "Verifique todos os campos e tente novamente, Não poderá ter tipo administrador duplicados!", 2);
            }

            $this->redirect('tipoAdministrador/cadastro');
        } else {
            $dados['status'] = $this->status($dados['status']);
            $x = '';

            foreach ($dados as $indice => $value) {
                $x .= "campo " . \App\Models\Entidades\TipoAdministrador::CAMPOSINFO[$indice]['descricao'] . ": " . $value . "<br>";
            }

            $TipoPermissaoBO = new \App\Models\BO\TipoPermissaoBO();
            $PermissaoBO = new \App\Models\BO\PermissaoBO();

            foreach ($vetor['permissao'] as $item) {
                $dados = [
                    'tipo_administrador_id' => $id,
                    'permissao_id' => $item
                ];

                $id_tipo_permissao = $TipoPermissaoBO->inserir(\App\Models\Entidades\TipoPermissao::TABELA['nome'], $dados, \App\Models\Entidades\TipoPermissao::CAMPOSINFO);
                if ($id_tipo_permissao != FALSE) {
                    $permissao = $PermissaoBO->selecionarVetor(\App\Models\Entidades\Permissao::TABELA['nome'], ['permissao'], 1, null, "id = ?", [$id_tipo_permissao], null);
                    $x .= "campo " . \App\Models\Entidades\TipoPermissao::CAMPOSINFO['permissao_id']['descricao'] . ": " . $permissao['permissao'] . '<br>';
                }
            }

            $info = [
                'tipo' => 1,
                'administrador' => Sessao::getAdministrador('id'),
                'campos' => $x,
                'tabela' => \App\Models\Entidades\TipoAdministrador::TABELA['descricao'],
                'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou o cadastro de uma novo tipo de administrador.'
            ];

            $this->inserirAuditoria($info);

            Sessao::limpaFormulario();
            Sessao::gravaMensagem("Sucesso", "Tipo de administrador " . $vetor['descricao'] . ", inserido", 1);

            $this->redirect('tipoAdministrador/listar/' . $vetor['descricao']);
        }
    }

    public function listar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(1);

        $css = '';
        $js = '<script src="' . JSTEMPLATE . 'bootstrap-confirmation/bootstrap-confirmation.min.js"></script>
              ';



        $bo = new \App\Models\BO\TipoAdministradorBO();

        if (!is_numeric($parametro[0])) {
            $this->redirect('tipoAdministrador/listar/1/' . $parametro[0]);
        }

        $p = (isset($parametro[0]) or is_numeric($parametro[0])) ? $parametro[0] : 1;
        $busca = (isset($parametro[1])) ? $parametro[1] : null;

        $quantidade = 10;
        $pagina = $p * $quantidade - $quantidade;

        $condicao = "status <> ?";
        $valoresCondicao = [0];

        if ($busca) {
            $condicao .= " and tipo like '%?%'";
            array_push($valoresCondicao, "$busca");
        }

        $orderBy = "tipo asc";

        $resultado = $bo->listar(\App\Models\Entidades\TipoAdministrador::TABELA['nome'], ["id", "tipo", "status"], $quantidade, $pagina, $condicao, $valoresCondicao, $orderBy);
        $this->setViewParam('tipoAdministrador', $resultado);

        $quanTipoAdministrador = $bo->selecionar(\App\Models\Entidades\TipoAdministrador::TABELA['nome'], ["count(id) as id"], $condicao, $valoresCondicao, $orderBy);

        $quanPaginas = ceil($quanTipoAdministrador->getId() / $quantidade);

        if ($p > $quanPaginas and $p != 1) {
            Sessao::gravaMensagem("Falha", "Página não encontrada", 2);
            $this->redirect('tipoAdministrador/listar');
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
            'quanTipoAdministrador' => $quanTipoAdministrador->getId(),
            'quanPaginas' => $quanPaginas,
            'inicio' => $i,
            'fim' => $fim,
            'pagina' => $p,
            'anterior' => $p - 1,
            'proxima' => $p + 1,
            'busca' => $busca
        );

        $this->setViewParam('paginacao', $paginacao);

        if ($quanTipoAdministrador->getId() < 1) {
            Sessao::gravaMensagem('', 'Nenhum registro encontrado!', 2);
        }

        $this->render('tipoAdministrador/listar', "Listagem", $css, $js, 1);
    }

    public function visualizar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(1);

        $id = $parametro[0];

        if (is_numeric($id)) {

            $bo = new \App\Models\BO\TipoAdministradorBO();
            $tipoAdministrador = $bo->selecionarVetor(\App\Models\Entidades\TipoAdministrador::TABELA['nome'], ['*'], "id = ?", [$id], null);

            if ($tipoAdministrador) {
                $css = '
                   
                ';

                $js = '
                   
                ';

                $permissaoAdministradorBO = new \App\Models\BO\PermissaoBO();
                $permissao = $permissaoAdministradorBO->listarVetor(\App\Models\Entidades\TipoPermissao::TABELA['nome'] . " tap inner join " . \App\Models\Entidades\Permissao::TABELA['nome'] . " pa on tap.permissao_id = pa.id", ['pa.*'], null, null, "tap.tipo_administrador_id = ?", [$tipoAdministrador['id']], null);

                $this->setViewParam('item', $tipoAdministrador);
                $this->setViewParam('permissao', $permissao);

                $this->render('tipoAdministrador/visualizar', $tipoAdministrador['tipo'], $css, $js, 1);
            } else {
                Sessao::gravaMensagem("Falha", "Tipo de administrador não encontrada", 2);
                $this->redirect('tipoAdministrador/listar');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
            $this->redirect('tipoAdministrador/listar');
        }
    }

    public function excluir($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(1);

        $id = $parametro[0];
        $status = $parametro[1];

        if (is_numeric($id) and is_numeric($status)) {
            if ($id == Sessao::getAdministrador('tipo_administrador_id')) {
                Sessao::gravaMensagem("Você nao pode excluir seu usuário", "Erro", 2);
                $this->redirect("tipoAdministrador/listar");
            }

            $bo = new \App\Models\BO\TipoAdministradorBO();
            $tabela = \App\Models\Entidades\TipoAdministrador::TABELA['nome'];
            $dados = [
                'status' => $status
            ];
            $condicao = "id = ?";
            $valorCondicao = [$id];
            $quantidade = 1;
            $validacao = \App\Models\Entidades\TipoAdministrador::CAMPOSINFO;

            $resposta = $bo->editar($tabela, $dados, $condicao, $valorCondicao, $quantidade, $validacao);

            if ($resposta) {
                Sessao::gravaMensagem("Sucesso", "Tipo de administrador excluido", 1);
                $info = [
                    'tipo' => 4,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => "campo " . \App\Models\Entidades\TipoAdministrador::CAMPOSINFO["status"]['descricao'] . ": Excluido",
                    'tabela' => \App\Models\Entidades\TipoAdministrador::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a exclusão do tipo de administrador "' . $resposta['tipo'] . '".'
                ];

                $this->inserirAuditoria($info);

                if ($id == Sessao::getAdministrador("tipo_administrador")) {
                    $this->redirect('administrador/sair');
                }
            } else {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Tipo de administrador não excluida", 2);
                }
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('tipoAdministrador/listar');
    }

    public function editar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(1);

        $id = $parametro[0];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\TipoAdministradorBO();
            $tipoAdministrador = $bo->selecionarVetor(\App\Models\Entidades\TipoAdministrador::TABELA['nome'], ['*'], "id = ?", [$id], '');

            if ($tipoAdministrador) {
                $permissaoBO = new \App\Models\BO\PermissaoBO();
                $lista = $permissaoBO->listarVetor(\App\Models\Entidades\Permissao::TABELA['nome'], ['*'], null, null, 'status = ?', [1], "permissao asc");
                $this->setViewParam("lista", $lista);
                $array = $permissaoBO->listarVetor(\App\Models\Entidades\TipoPermissao::TABELA['nome'], ['*'], null, null, "tipo_administrador_id = ?", [$id], '');

                $tipoAdministrador['permissao'] = array();
                foreach ($array as $valor) {
                    array_push($tipoAdministrador['permissao'], $valor['permissao_id']);
                }
                $this->setViewParam('item', $tipoAdministrador);

                $css = '
            <link rel="stylesheet" href="' . CSSTEMPLATE . '/switchery/switchery.min.css" >
        ';

                $js = '
         <script src="' . JSTEMPLATE . 'switchery/switchery.min.js"></script>
        ';

                $this->render("tipoAdministrador/editar", 'Edição', $css, $js, 1);
            } else {
                Sessao::gravaMensagem("Tipo de administrador não encontrado!", "Erro", 2);
                $this->redirect("tipoAdministrador/listar");
            }
        } else {
            Sessao::gravaMensagem("As Informações enviadas não correspodem ao Esperado!", "Acesso Incorreto", 3);
            $this->redirect("tipoAdministrador/listar");
        }
    }

    public function salvar() {
        $this->validaAdministrador();
        $this->nivelAcesso(1);
        
        $id = $_POST['id'];
        
        if(is_numeric($id)){
            $bo = new \App\Models\BO\TipoAdministradorBO();
            $permissaoBO = new \App\Models\BO\PermissaoBO();
            
            $vetor = $_POST;
            $dados = array();
            $campus = \App\Models\Entidades\TipoAdministrador::CAMPOS;
            
            if($vetor['status'] == "on"){
                $vetor['status'] = 1;
            } else {
                $vetor['status'] = 2;
            }
            
            foreach ( $vetor as $indice => $valor){
                if(in_array($indice, $campus)){
                    if($vetor[$indice] == ''){
                        $dados[$indice] == "null";
                    } else {
                        $dados[$indice] = $vetor[$indice];
                    }
                }
            }
            $resultadoUpdate = $bo->editar(\App\Models\Entidades\TipoAdministrador::TABELA['nome'], $dados, "id = ?", [$id], 1, \App\Models\Entidades\TipoAdministrador::CAMPOSINFO);
            
            $tabela= \App\Models\Entidades\Permissao::TABELA['nome'] . " pa inner join " . \App\Models\Entidades\TipoPermissao::TABELA['nome'] . " tap on tap.permissao_id = pa.id";
            $permissoes = $permissaoBO->listarVetor($tabela, ['id', 'permissao'], null, null, "tap.tipo_administrador_id = ?", [$id], "pa.id");
            $todasPermissoes = $permissaoBO->listarVetor(\App\Models\Entidades\Permissao::TABELA['nome'], ['id', 'permissao'], null, null, "", [], "id");

            $arrayAtual = array();
            $arrayNovo = array();
            $arrayPermissoes = array();

            foreach ($permissoes as $item){
                array_push($arrayAtual, $item['id']);
            }

            if(isset($_POST['permissao'])){
                foreach ($_POST['permissao'] as $item){
                    array_push($arrayNovo, $item);
                }
            }

            foreach ($todasPermissoes as $item){
                $arrayPermissoes[$item['id']] = $item;
            }

            $apagar = array_diff($arrayAtual, $arrayNovo);
            $inserir = array_diff($arrayNovo, $arrayAtual);

            $y = "";
            if($apagar or $inserir){
                if($apagar){
                    $y .= "<br>Permissões negadas:<br>";

                    foreach ($apagar as $item){
                        $permissaoBO->excluir(\App\Models\Entidades\TipoPermissao::TABELA['nome'], "tipo_administrador_id = ? and permissao_id = ?", [$id, $item], 1, true);
                        $y .= $arrayPermissoes[$item]["permissao"] . "<br>";
                    }
                }

                if($inserir){
                    $y .= "<br>Permissões concedidas:<br>";
                    foreach ($inserir as $item){
                        $dados2 = [
                            'tipo_administrador_id' => $id,
                            'permissao_id' => $item
                        ];

                        $bo->inserir(\App\Models\Entidades\TipoPermissao::TABELA['nome'], $dados2, \App\Models\Entidades\TipoPermissao::CAMPOSINFO, true);
                        $y .= $arrayPermissoes[$item]["permissao"] . "<br>";
                    }
                }

                $resultadoPermissao = TRUE;
            } else {
                $resultadoPermissao = False;
            }

            if(($resultadoUpdate == FALSE and $resultadoPermissao == FALSE)){
                if(!Sessao::existeMensagem()){
                    Sessao::gravaMensagem($vetor['tipo'], "Tipo de administrador sem edição", 2);
                }
            }else{
                
                $x = '';
                if($resultadoUpdate){
                    $dados['status'] = $this->status($dados['status']);
                    $resultadoUpdate['status'] = $this->status($resultadoUpdate['status']);
                    foreach ($dados as $indice => $value) {
                        if($resultadoUpdate[$indice] != $value){
                            $x .= "campo " . \App\Models\Entidades\TipoAdministrador::CAMPOSINFO[$indice]['descricao'] . ' editado de : "' . $resultadoUpdate[$indice] . '" para "' . $value . '"<br>';
                        }
                    }
                }

                $info = [
                    'tipo' => 2,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => $x.$y,
                    'tabela' => \App\Models\Entidades\TipoAdministrador::TABELA['descricao'],
                    'descricao' => 'O '.Sessao::getAdministrador('tipo_administrador_nome').' '. Sessao::getAdministrador("nome") .', efetuou a edição da tipo de administrador "'. $vetor['tipo'] .'".'
                ];

                $this->inserirAuditoria($info);

                if($id == Sessao::getAdministrador("tipo_administrador_id")){
                    $this->redirect('administrador/sair');
                }

                Sessao::gravaMensagem("Sucesso", "TipoAdministrador " . $vetor['tipo'] . ", editado", 1);

                $this->redirect('tipoAdministrador/visualizar/'. $id);
            }

            $this->redirect('tipoAdministrador/editar/'. $id);
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('tipoAdministrador/listar');
        }
    }


