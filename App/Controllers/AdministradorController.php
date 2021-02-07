<?php

namespace App\Controllers;

use App\Lib\Sessao;

class AdministradorController extends Controller {

    public function index() {
        $this->validaAdministrador();

        $css = '';
        $js = '';

        $this->render("administrador/index", "Início", $css, $js, 1);
    }

    public function uploadFoto() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $retorno = $this->upload($_FILES['foto'], './public/imagem/administrador/', false, 2, ['.png', '.jpeg', '.jpg']);

        if ($retorno) {
            $bo = new \App\Models\BO\AdministradorBO();
            $resultado = $bo->editar(\App\Models\Entidades\Administrador::TABELA['nome'], ['foto' => $retorno], "id = ?", [$_POST['id']], 1, \App\Models\Entidades\Administrador::CAMPOSINFO);

            if ($resultado) {
                if ($resultado['foto'] != '') {
                    $x = 'Foto editada de:<br><img src="' . IMAGEM . 'administrador/' . $resultado['foto'] . '" width="250px" alt="Foto não encontrada!"><br>para:<br><img src="' . IMAGEM . 'administrador/' . $retorno . '" width="250px" alt="Foto não encontrada">';
                } else {
                    $x = 'Foto<br><img src"' . IMAGEM . 'administrador/' . $retorno . '" width="250px" alt="Foto não encontrada">';
                }
                 $info = [
                'tipo' => 2,
                'administrador' => Sessao::getAdministrador('id'),
                'campos' => $x,
                'tabela' => \App\Models\Entidades\Administrador::TABELA['descricao'],
                'descricao' => 'O ' . Sessao::getAdministrador('tipo') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a ediçao de uma foto de administrador.'
            ];
                 
           // $img = new \App\Models\Entidades\Canvas();
            
          //  $img->carrega('./public/imagem/administrador/'.$retorno)
          //  ->hexa('#FFFFFF')
          //  ->redimensiona(800, 800, 'preenchimento')
          //  ->redimensiona('50%')
           // ->grava('./public/imagem/administrador/'.$retorno);
                    
            $this->inserirAuditoria($info);
            Sessao::gravaMensagem("Imagem de Perfil Alterada!", "Foto Administrador", 1);
            $this->redirect('administrador/editar/' . $_POST['id']);
            }
        } else {
            unlink('./public/imagem/administrador/' . $retorno);
            Sessao::gravaMensagem("Erro ao inserir foto!", "Erro", 2);
            $this->redirect('administrador/editar/' . $_POST['id']);
        }
    }

    public function acesso() {
        $css = '
               <link rel="stylesheet" href="' . CSSTEMPLATE . 'prism/prism.css" media="screen" >
               ';
        $js = null;

        if (isset($_COOKIE['Estrutura2020MVCPadrao-usuario'])) {
            $info = [
                'usuario' => $_COOKIE['Estrutura2020MVCPadrao-usuario'],
                'senha' => $_COOKIE['Estrutura2020MVCPadrao-senha'],
                'checkbox' => $_COOKIE['Estrutura2020MVCPadrao-usuario'] ? 'checked' : ''
            ];
        } else {
            $info = [
                'usuario' => '',
                'senha' => '',
                'checkbox' => ''
            ];
        }
        $this->setViewParam('info', $info);

        $this->render("administrador/acesso", "Tela de Acesso ao Sistema", $css, $js, 2);
    }

    public function entrar() {

        if (trim($_POST['usuario']) != '' and trim($_POST['senha']) != '') {
            $bo = new \App\Models\BO\AdministradorBO;
            $administrador = $bo->selecionarVetor(\App\Models\Entidades\Administrador::TABELA['nome'] . ' a inner join ' . \App\Models\Entidades\TipoAdministrador::TABELA['nome'] . ' ta on a.tipo_administrador_id = ta.id ', ['a.*', 'ta.tipo'], "a.usuario = '?' and a.senha = '?' and a.status = ? and ta.status = ?", [$_POST['usuario'], $_POST['senha'], 1, 1], '');
            if ($administrador) {
                if (isset($_POST['lembrarSenha'])) {
                    setcookie('Estrutura2020MVCPadrao-usuario', $_POST['usuario'], time() + (86400 * 30), "/");
                    setcookie('Estrutura2020MVCPadrao-senha', $_POST['senha'], time() + (86400 * 30), "/");
                } else {

                    setcookie('Estrutura2020MVCPadrao-usuario', null, -1, "/");
                    setcookie('Estrutura2020MVCPadrao-senha', null, -1, "/");
                }

                $permissoes = $bo->listarVetor(\App\Models\Entidades\TipoPermissao::TABELA['nome'], ['permissao_id'], null, null, 'tipo_administrador_id = ?', [$administrador['tipo_administrador_id']], null);

                foreach ($permissoes as $item) {
                    $administrador['permissao'][] = $item['permissao_id'];
                }


                Sessao::setAdministrador($administrador);
                Sessao::setlogadoAdministrador(true);

                Sessao::gravaMensagem("Olá seja bem-vindo " . $administrador['nome'] . ' . ', " Você entrou no sistema!", 1);

                $dados = [
                    'tipo' => 5,
                    'tabela' => \App\Models\Entidades\Administrador::TABELA['nome'],
                    'campos' => '',
                    'descricao' => 'O ' . $administrador['tipo'] . ' ' . $administrador['nome'] . ' acessou o sistema!'
                ];
                $this->inserirAuditoria($dados);


                $this->redirect('administrador/');
            } else {
                Sessao::gravaMensagem("Usuário e/ou senha incorretos.", "Erro ao acessar!", 2);
                $this->redirect('administrador/acesso');
            }
        } else {
            Sessao::gravaMensagem("Preencha o usuário e a senha corretamente.", "Erro ao acessar!", 3);
            $this->redirect('administrador/acesso');
        }
    }

    public function sair() {
        //Auditoria]
        $dados = [
            'tipo' => 5,
            'tabela' => \App\Models\Entidades\Administrador::TABELA['nome'],
            'campos' => '',
            'descricao' => 'O ' . Sessao::getAdministrador('tipo') . ' ' . $administrador['nome'] . ' saiu do sistema!'
        ];

        $this->inserirAuditoria($dados);

        Sessao::setAdministrador(null);
        Sessao::setlogadoAdministrador(false);
        Sessao::gravaMensagem('Você saiu do sistema.', "Sucesso!", 1);

        $this->redirect('administrador/acesso');
    }

    public function cadastro() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $css = '
                <link rel="stylesheet" href="' . CSSTEMPLATE . '/switchery/switchery.min.css" >
                <link rel="stylesheet" href="' . CSSTEMPLATE . '/select2/select2.min.css" >    
        ';

        $js = '
            <script src="' . JSTEMPLATE . 'switchery/switchery.min.js"></script>
            <script src="' . JSTEMPLATE . 'select2/select2.min.js"></script>
            <script src="' . JSTEMPLATE . 'jquery.mask.js"></script>
        ';

        $bo = new \App\Models\BO\TipoAdministradorBO();
        $tipoAdministrador = $bo->listarVetor(\App\Models\Entidades\TipoAdministrador::TABELA['nome'], ['*'], null, null, 'status = ?', [1], 'tipo asc');
        $this->setViewParam('tipo_administrador', $tipoAdministrador);

        $this->render('administrador/cadastro', "Cadastro", $css, $js, 1);
    }

    public function listar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);



        if (!is_numeric($parametro[0])) {
            $buscar = isset($parametro[0]) ? $parametro[0] : '';
            $this->redirect('administrador/listar/1/' . $buscar);
        }

        $buscar = (isset($parametro[1])) ? $parametro[1] : null;
        //parametros do listarVetor mysql
        $condicao = "a.status <> ?";
        $Valorescondicao = [0];

        if ($buscar) {
            $condicao .= " and a.nome Like '%?%'";
            array_push($Valorescondicao, "$buscar");
        }


        $css = '';
        $js = '<script src="' . JSTEMPLATE . 'bootstrap-confirmation/bootstrap-confirmation.min.js"></script>';

        $p = $parametro[0];
        $quantidade = 10;

        //Definição de como funciona a busca
        $pagina = $p * $quantidade - $quantidade;

        $orderBy = 'at.tipo';


        $bo = new \App\Models\BO\AdministradorBO();
        $listar = $bo->listarVetor(\App\Models\Entidades\Administrador::TABELA['nome'] . ' a inner join ' . \App\Models\Entidades\TipoAdministrador::TABELA['nome'] . ' at on a.tipo_administrador_id = at.id', ['a.id', 'a.nome', 'at.tipo', 'a.status'], $quantidade, $pagina, $condicao, $Valorescondicao, $orderBy);
        $this->setViewParam('listar', $listar);

        $quantAdministrador = $bo->selecionar(\App\Models\Entidades\Administrador::TABELA['nome'] . ' a inner join ' . \App\Models\Entidades\TipoAdministrador::TABELA['nome'] . ' at on a.tipo_administrador_id = at.id', ["count(a.id) as id"], $condicao, $Valorescondicao, $orderBy);

        //Arrendoda a quantidade de Paginas
        $quantPaginas = ceil($quantAdministrador->getId() / $quantidade);

        if ($p > $quantPaginas and $p != 1) {
            Sessao::gravaMensagem('Pagina não encontrada', "Falha", 2);
            $this->redirect("administrador/listar");
        }
        //Formata as numerações das paginas
        if ($p < 5) {
            $i = 0;
            $fim = $quantPaginas < 5 ? $quantPaginas : 5;
        } else {
            if ($p < $quantPaginas - 2) {
                $i = $p - 3;
                $fim = $p + 2;
            } else {
                $i = $quantPaginas - 5;
                $fim = $quantPaginas;
            }
        }

        $paginacao = array(
            "quantAdministrador" => $quantAdministrador->getId(),
            "quantPaginas" => $quantPaginas,
            "inicio" => $i,
            "fim" => $fim,
            "pagina" => $p,
            "anterior" => $p - 1,
            "proxima" => $p + 1,
            "buscar" => $buscar
        );

        $this->setViewParam("paginacao", $paginacao);

        if ($quantAdministrador->getId() < 1) {
            Sessao::gravaMensagem("Nenhum Registro foi encontrado!", "", 2);
        }

        $this->render('administrador/listar', "Listar Administrador", $css, $js, 1);
    }

    public function verificaUsuarioAjax() {
        $usuario = $_POST['usuario'];
        $usuario = trim($usuario);

        if ($usuario != '') {
            if (strlen($usuario) < 4) {
                $resposta = [
                    'status' => 0,
                    'msg' => '<p class="text-danger">O usuário deve ter no minímo 4 caracteres!</p>'
                ];
            } else {
                $bo = new \App\Models\BO\AdministradorBO();
                $existe = $bo->selecionarVetor(\App\Models\Entidades\Administrador::TABELA['nome'], ['*'], "usuario = '?'", [$usuario], '');



                if ($existe) {
                    if ($existe['usuario'] == $usuario) {
                        $resposta = ['resposta' => true, 'msg' => '<p style="color: #0ddc16">Usuário atual!</p>'];
                        echo json_encode($resposta);
                        exit;
                    }
                    $resposta = [
                        'status' => 0,
                        'msg' => '<p class="text-danger">Usuário "' . $usuario . '" já existe!</p>'
                    ];
                } else {
                    $resposta = [
                        'status' => 1,
                        'msg' => '<p class="text-success">Usuário "' . $usuario . '" Esta disponivel!</p>',
                        'usuario' => $usuario
                    ];
                }
            }
        } else {
            $resposta = [
                'status' => 0,
                'msg' => '<p class="text-danger">Preencha o usuário!</p>'
            ];
        }
        echo json_encode($resposta);
    }

    public function inserir() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $bo = new \App\Models\BO\AdministradorBO();

        $vetor = $_POST;
        Sessao::gravaFormulario($vetor);

        $dados = array();
        $campus = \App\Models\Entidades\Administrador::CAMPOS;

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

        $dados['cadastro'] = date("Y-m-d H:i:s");

        $id = $bo->inserir(\App\Models\Entidades\Administrador::TABELA['nome'], $dados, \App\Models\Entidades\Administrador::CAMPOSINFO);

        if ($id == FALSE) {
            if (!Sessao::existeMensagem()) {
                Sessao::gravaMensagem("Falha", "Verifique todos os campos e tente novamente", 2);
            }

            $this->redirect('administrador/cadastro');
        } else {
            $tipoAdministradorBO = new \App\Models\BO\TipoAdministradorBO();
            $tipoAdministrador = $tipoAdministradorBO->selecionarVetor(\App\Models\Entidades\TipoAdministrador::TABELA['nome'], ['*'], "id = ?", [$vetor['tipo_administrador_id']], null);

            $dados['status'] = $this->status($dados['status']);
            $dados['tipo_administrador_id'] = $tipoAdministrador['tipo'];
            unset($dados['cadastro']);
            unset($dados['senha']);

            $x = '';
            foreach ($dados as $indice => $value) {
                if ($value != "null") {
                    $x .= "campo " . \App\Models\Entidades\Administrador::CAMPOSINFO[$indice]['descricao'] . ": " . $value . "<br>";
                }
            }

            $info = [
                'tipo' => 1,
                'administrador' => Sessao::getAdministrador('id'),
                'campos' => $x,
                'tabela' => \App\Models\Entidades\Administrador::TABELA['descricao'],
                'descricao' => 'O ' . Sessao::getAdministrador('tipo') . ' ' . Sessao::getAdministrador("nome") . ', efetuou o cadastro de um novo administrador.'
            ];

            $this->inserirAuditoria($info);

            Sessao::limpaFormulario();
            Sessao::gravaMensagem("Sucesso", "Administrador " . $vetor['nome'] . ", inserido", 1);

            $this->redirect('administrador/listar/');
        }
    }

    public function excluir($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $id = $parametro[0];
        $status = $parametro[1];

        if (Sessao::getAdministrador('id') == $id) {
            Sessao::gravaMensagem("Falha", "Não é possível excluir uma conta com uma sessão ativa", 3);
            $this->redirect('administrador/listar');
        }

        if (is_numeric($id) and is_numeric($status)) {

            $bo = new \App\Models\BO\AdministradorBO();
            $tabela = \App\Models\Entidades\Administrador::TABELA['nome'];
            $dados = [
                'status' => $status
            ];
            $condicao = "id = ?";
            $valorCondicao = [$id];
            $quantidade = 1;
            $campos = \App\Models\Entidades\Administrador::CAMPOSINFO;

            $resposta = $bo->editar($tabela, $dados, $condicao, $valorCondicao, $quantidade, $campos);

            if ($resposta) {
                $administradorBO = new \App\Models\BO\AdministradorBO();
                $tabela = \App\Models\Entidades\Administrador::TABELA['nome'];
                $administrador = $administradorBO->selecionarVetor($tabela, ['*'], 1, null, "id = ?", [$id], null);

                Sessao::gravaMensagem("Sucesso", "Administrador excluido", 1);

                $info = [
                    'tipo' => 4,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => "campo " . \App\Models\Entidades\Administrador::CAMPOSINFO["status"]['descricao'] . ": Excluido",
                    'tabela' => \App\Models\Entidades\Administrador::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a exclusão do administrador ' . $administrador['nome']
                ];

                $this->inserirAuditoria($info);
            } else {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Administrador não excluido", 2);
                }
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('administrador/listar');
    }

    public function visualizar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $id = $parametro[0];

        if (is_numeric($id)) {

            $bo = new \App\Models\BO\AdministradorBO();

            $tabela = \App\Models\Entidades\Administrador::TABELA['nome'] . ' a inner join ' . \App\Models\Entidades\TipoAdministrador::TABELA['nome'] . ' ta on a.tipo_administrador_id = ta.id';


            $administrador = $bo->selecionarVetor($tabela, ['a.*', 'ta.id as id_tipo_administrador', 'ta.tipo', 'date_format(a.cadastro, "%d/%m/%Y às %H:%i") as cadastro'], " a.id = ? ", [$id], null);


            if ($administrador) {
                $css = '
                   
                ';

                $js = '
                  
                      ';
                $this->setViewParam('item', $administrador);
                $this->render('administrador/visualizar', $administrador['nome'], $css, $js, 1);
            } else {
                Sessao::gravaMensagem("Administrador não encontrada", "Falha", 2);
                $this->redirect('administrador/listar');
            }
        } else {
            Sessao::gravaMensagem("As informações enviadas não conrrespondem ao esperado", "Acesso incorreto", 3);
            $this->redirect('administrador/listar');
        }
    }

    public function editar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $id = $parametro[0];

        if (is_numeric($id)) {

            $bo = new \App\Models\BO\AdministradorBO();

            $administrador = $bo->selecionarVetor(\App\Models\Entidades\Administrador::TABELA['nome'], ['*'], "id = ?", [$id], null);

            if ($administrador) {
                $css = '
                   <link rel="stylesheet" href="' . CSSTEMPLATE . '/switchery/switchery.min.css" >
                   <link rel="stylesheet" href="' . CSSTEMPLATE . '/select2/select2.min.css" > 
                ';

                $js = '
                    <script src="' . JSTEMPLATE . 'switchery/switchery.min.js"></script>
                    <script src="' . JSTEMPLATE . 'select2/select2.min.js"></script>
                    <script src="' . JSTEMPLATE . 'jquery.mask.js"></script>
                      ';

                $tipoAdministradorBO = new \App\Models\BO\TipoAdministradorBO();
                $lista = $tipoAdministradorBO->listarVetor(\App\Models\Entidades\TipoAdministrador::TABELA['nome'], ['*'], null, null, "status <> ?", [0], "tipo asc");

                $this->setViewParam('tipo_administrador', $lista);
                $this->setViewParam('item', $administrador);

                $this->render('administrador/editar', $administrador['nome'], $css, $js, 1);
            } else {
                Sessao::gravaMensagem("Tipo de administrador não encontrada", "Falha", 2);
                $this->redirect('administrador/listar');
            }
        } else {
            Sessao::gravaMensagem("As informações enviadas não conrrespondem ao esperado", "Acesso incorreto", 3);
            $this->redirect('administrador/listar');
        }
    }

    public function salvar() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);
        $id = $_POST['administrador'];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\AdministradorBO();

            $vetor = $_POST;

            if ($vetor['status'] == "on") {
                $vetor['status'] = 1;
            } else {
                $vetor['status'] = 2;
            }

            if (trim($vetor['senha']) == '') {
                unset($vetor['senha']);
            }

            $dados = array();
            $campus = \App\Models\Entidades\Administrador::CAMPOS;

            foreach ($vetor as $indice => $valor) {
                if (in_array($indice, $campus)) {
                    if ($vetor[$indice] == '') {
                        $dados[$indice] = "null";
                    } else {
                        $dados[$indice] = $vetor[$indice];
                    }
                }
            }

            $resultado = $bo->editar(\App\Models\Entidades\Administrador::TABELA['nome'], $dados, "id = ?", [$id], 1, \App\Models\Entidades\Administrador::CAMPOSINFO);

            if ($resultado == FALSE) {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Administrador sem edição", $vetor['nome'], 2);
                }

                $this->redirect('administrador/visualizar/' . $id);
            } else {
                $x = '';

                $dados['status'] = $this->status($dados['status']);
                $resultado['status'] = $this->status($resultado['status']);
                //aparecer o nome do tipo administrador e não apenas o id.
                $botipo = new \App\Models\BO\TipoAdministradorBO();

                $tipo = $botipo->selecionarVetor(\App\Models\Entidades\TipoAdministrador::TABELA['nome'], ['id', 'tipo'], "id = ?", [$dados['tipo_administrador_id']], '');
                $dados['tipo_administrador_id'] = $tipo['id'] . '-' . $tipo['tipo'];

                $tipo = $botipo->selecionarVetor(\App\Models\Entidades\TipoAdministrador::TABELA['nome'], ['id', 'tipo'], "id = ?", [$resultado['tipo_administrador_id']], '');
                $resultado['tipo_administrador_id'] = $tipo['id'] . '-' . $tipo['tipo'];

                unset($dados['senha']);
                unset($resultado['senha']);

                foreach ($dados as $indice => $value) {
                    if ($value == '') {
                        $value = '-';
                    }

                    if ($resultado[$indice] == '') {
                        $resultado[$indice] = '-';
                    }

                    if (($resultado[$indice] != $value)) {
                        $x .= "campo " . \App\Models\Entidades\Administrador::CAMPOSINFO[$indice]['descricao'] . ' editado de: "' . $resultado[$indice] . '" para "' . $value . '"<br>';
                    }
                }


                $info = [
                    'tipo' => 2,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => $x,
                    'tabela' => \App\Models\Entidades\Administrador::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a edição da administrador "' . $resultado['nome'] . '".'
                ];

                $this->inserirAuditoria($info);

                Sessao::gravaMensagem("Administrador " . $resultado['nome'] . ", editado", "Sucesso", 1);

                if (Sessao::getAdministrador('id') != $resultado['id']) {
                    $this->redirect('administrador/visualizar/' . $resultado['id']);
                } else {
                    $this->redirect('administrador/sair');
                }
            }
        } else {
            Sessao::gravaMensagem("As informações enviadas não conrrespondem ao esperado", "Acesso incorreto", 3);
        }

        $this->redirect('administrador/listar');
    }

}
