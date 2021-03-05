<?php

namespace App\Controllers;

use App\Lib\Sessao;

class ContatoController extends Controller {

    public function index() {
        $css = null;
        $js = '<script type="text/javascript" src="' . JSSITE . 'script.js"></script>';

        $this->render("home/contato", "Contato", $css, $js, 3);
    }

    // public function inserir() {
    //  $bo = new \App\Models\BO\ContatoBO();
    //  $vetor = $_REQUEST;
    //   $dados = array();
    //  $campus = \App\Models\Entidades\Contato::CAMPOS;
    // Sessao::gravaFormulario($vetor);
    //    $vetor['status'] = 2;
    //  foreach ($vetor as $indice => $valor) {
    //    if (in_array($indice, $campus)) {
    //         if ($vetor[$indice] == '') {
    //       $dados[$indice] = "null";
    //      } else {
    //          $dados[$indice] = $vetor[$indice];
    //     }
    //   }
    //}
    // $id = $bo->inserir(\App\Models\Entidades\Contato::TABELA['nome'], $dados, \App\Models\Entidades\Contato::CAMPOSINFO);
    //if ($id == FALSE) {
    // Sessao::gravaMensagemSite("Mensagem não enviada!, Tente Novamente.");
    // $this->redirect('contato');
    //} else {
    // $x = '';
    //foreach ($dados as $indice => $value) {
    // if ($value != "null") {
    //  $x .= "campo " . \App\Models\Entidades\Contato::CAMPOSINFO[$indice]['descricao'] . ": " . $value . "<br>";
    //  }
    // }
    //$info = [
    //  'tipo' => 1,
    // 'campos' => $x,
    // 'tabela' => \App\Models\Entidades\Contato::TABELA['descricao'],
    //  'descricao' => 'O Internauta efetuou o cadastro de um novo Contato'
    //];
    // $this->inserirAuditoria($info);
    // Sessao::limpaFormulario();
    // Sessao::gravaMensagemSite("Contato enviado");
    //  $this->redirect('contato');
    // }
    // }

    public function listar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $css = '
         
        ';

        $js = '
            <script src="' . JSTEMPLATE . 'bootstrap-confirmation/bootstrap-confirmation.min.js"></script>
        ';

        $bo = new \App\Models\BO\ContatoBO();

        if (!is_numeric($parametro[0])) {
            $this->redirect('contato/listar/1/' . $parametro[0]);
        }
        $p = (isset($parametro[0]) or is_numeric($parametro[0])) ? $parametro[0] : 1;
        $busca = (isset($parametro[1])) ? $parametro[1] : null;

        $quantidade = 10;
        $pagina = $p * $quantidade - $quantidade;

        $condicao = "status <> ?";
        $valoresCondicao = [0];

        if ($busca) {
            $condicao .= " and nome like '%?%'";
            array_push($valoresCondicao, "$busca");
        }

        $orderBy = "nome asc";

        $tabela = \App\Models\Entidades\Contato::TABELA['nome'];

        $resultado = $bo->listarVetor($tabela, ["*"], $quantidade, $pagina, $condicao, $valoresCondicao, $orderBy);

        $this->setViewParam('contato', $resultado);

        $quanContato = $bo->selecionar($tabela, ["count(id) as id"], $condicao, $valoresCondicao, $orderBy);

        $quanPaginas = ceil($quanContato->getId() / $quantidade);

        if ($p > $quanPaginas and $p != 1) {
            Sessao::gravaMensagem("Falha", "Página não encontrada", 2);
            $this->redirect('contato/listar');
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
            'quanContato' => $quanContato->getId(),
            'quanPaginas' => $quanPaginas,
            'inicio' => $i,
            'fim' => $fim,
            'pagina' => $p,
            'anterior' => $p - 1,
            'proxima' => $p + 1,
            'busca' => $busca
        );

        $this->setViewParam('paginacao', $paginacao);

        if ($quanContato->getId() < 1) {
            Sessao::gravaMensagem('', 'Nenhum registro encontrado!', 2);
        }

        $this->render('contato/listar', "Listagem", $css, $js, 1);
    }

    public function excluir($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(1);

        $id = $parametro[0];
        $status = $parametro[1];

        if (is_numeric($id) and is_numeric($status)) {
            $bo = new \App\Models\BO\ContatoBO();
            $tabela = \App\Models\Entidades\Contato::TABELA['nome'];
            $dados = [
                'status' => $status
            ];
            $condicao = "id = ?";
            $valorCondicao = [$id];
            $quantidade = 1;
            $validacao = \App\Models\Entidades\Contato::CAMPOSINFO;

            $resposta = $bo->editar($tabela, $dados, $condicao, $valorCondicao, $quantidade, $validacao);


            if ($resposta) {
                Sessao::gravaMensagem("Sucesso", "Contato excluido", 1);
                $info = [
                    'tipo' => 3,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => "campo " . \App\Models\Entidades\Contato::CAMPOSINFO["status"]['descricao'] . ": Excluido",
                    'tabela' => \App\Models\Entidades\Contato::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a exclusão do contato"' . $resposta['nome'] . '".'
                ];

                $this->inserirAuditoria($info);
            } else {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Contato não excluído!", 2);
                }
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('contato/listar');
    }

    public function visualizar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $id = $parametro[0];

        if (is_numeric($id)) {

            $bo = new \App\Models\BO\ContatoBO();

            $tabela = \App\Models\Entidades\Contato::TABELA['nome'];
            $bo->editar($tabela, ['status' => 1], "id = ?", [$id], 1, \App\Models\Entidades\Contato::CAMPOSINFO);
            $contato = $bo->selecionarVetor($tabela, ['*'], "id = ?", [$id], null);

            if ($contato) {
                $css = '';
                $js = '';


                $this->setViewParam('item', $contato);
                $this->render('contato/visualizar', $contato['nome'], $css, $js, 1);
            } else {
                Sessao::gravaMensagem("Falha", "Contato não encontrado", 2);
                $this->redirect('contato/listar');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
            $this->redirect('contato/listar');
        }
    }

    public function editar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $id = $parametro[0];

        if (is_numeric($id)) {

            $bo = new \App\Models\BO\ContatoBO();
            $contato = $bo->selecionarVetor(\App\Models\Entidades\Contato::TABELA['nome'], ['*'], "id = ?", [$id], null);

            if ($contato) {
                $css = '
                    <link rel="stylesheet" href="' . CSSTEMPLATE . '/switchery/switchery.min.css" >
                    <link rel="stylesheet" href="' . CSSTEMPLATE . '/select2/select2.min.css" >
                ';

                $js = '
                    <script src="' . JSTEMPLATE . 'switchery/switchery.min.js"></script>
                    <script src="' . JSTEMPLATE . 'select2/select2.min.js"></script>
                    <script src="' . JSTEMPLATE . 'jquery.mask.js"></script>
               ';

                $this->setViewParam('item', $contato);

                $this->render('contato/editar', $contato['nome'], $css, $js, 1);
            } else {
                Sessao::gravaMensagem("Falha", "Contato não encontrado", 2);
                $this->redirect('contato/listar');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem  ao esperado", 3);
            $this->redirect('contato/listar');
        }
    }

    public function salvar() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);
        $id = $_POST['contato'];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\ContatoBO();

            $vetor = $_POST;

            $dados = array();
            $campus = \App\Models\Entidades\Contato::CAMPOS;

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

            $resultado = $bo->editar(\App\Models\Entidades\Contato::TABELA['nome'], $dados, "id = ?", [$id], 1, \App\Models\Entidades\Contato::CAMPOSINFO);

            if (Sessao::existeMensagem() or $resultado == FALSE) {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem($vetor['descricao'], "Contato sem edição", 2);
                }

                $this->redirect('contato/listar');
            } else {
                $x = '';

                foreach ($dados as $indice => $value) {
                    if ($value == 'null') {
                        $value = '';
                    }

                    if ($resultado[$indice] != $value) {
                        $x .= "campo " . \App\Models\Entidades\Contato::CAMPOSINFO[$indice]['descricao'] . ' editado de: "' . $resultado[$indice] . '" para "' . $value . '"<br>';
                    }
                }

                $info = [
                    'tipo' => 2,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => $x,
                    'tabela' => \App\Models\Entidades\Contato::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a edição das informações de um Contato.'
                ];

                $this->inserirAuditoria($info);

                Sessao::gravaMensagem("Sucesso", "Contato, editado", 1);

                $this->redirect('contato/visualizar/' . $id);
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('contato/listar');
    }

    public function inserirAjax() {

        $bo = new \App\Models\BO\ContatoBO();
        $vetor = $_POST;
        $dados = array();
        $campus = \App\Models\Entidades\Contato::CAMPOS;

        $vetor['status'] = 2;

        foreach ($vetor as $indice => $valor) {
            if (in_array($indice, $campus)) {
                if ($vetor[$indice] == '') {
                    $dados[$indice] = "null";
                } else {
                    $dados[$indice] = $vetor[$indice];
                }
            }
        }

        if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            $retorno = [
                'status' => '0',
                'msg' => 'Email digitado inválido!'
            ];
            echo json_encode($retorno);
            exit();
        }

        $id = $bo->inserir(\App\Models\Entidades\Contato::TABELA['nome'], $dados, \App\Models\Entidades\Contato::CAMPOSINFO);



        if ($id == FALSE) {

            if (!Sessao::existeMensagemSite()) {
                $retorno = [
                    'status' => '0',
                    'msg' => 'Verifique todos os campos e tente novamente'
                ];
            } else {
                $retorno = [
                    'status' => '0',
                    'msg' => Sessao::retornaMensagemSite()
                ];
                Sessao::limpaMensagemSite();
            }

            echo json_encode($retorno);
        } else {

            $corpoEmail = " 
                 <style type='text/css'>

                   *{
                      margin: 0;
                    }

                    img {
                       width: 150px;
                       margin: 10px;
                     }

                    .corpo{
                      width: 100%;
                      background-color: #f1f1f1;
                      text-align: center;
                      font-family: arial;
                      padding: 20px;
                    }

                    h1{
                      color: #610a0a;
                    }

                    h2{
                      margin: 5px;
                    }

                    p{
                       color: #838383
                    }
                </style>
                <html>
                     <div class='corpo'>
                        <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStacH0xkaYdiC9AKpSsT4CQPfA4w1oVIikOg&usqp=CAU'/>
                        <h1>Contato recebido pelo site</h1>
                        <h2>Nome: ".$dados['nome']."</h2>
                        <h2>Telefone: ".$dados['telefone']."</h2>
                        <h2>Email: ".$dados['email']."</h2>
                        <h2>Assunto: ".$dados['assunto']."</h2>
                        <p>Contato enviado em ".date('d/m/Y')." as ".date('H:i:s')."</p>
                     </div>
                </html>
     
            ";
            
            $assunto = "Contato pelo Site";
            $destino = "maxuel@maxxconstrutora.com.br";
            $usuario = $dados['nome'];
            $emailEnvio = $dados['email'];
            
            $this->enviar_email($corpoEmail, $assunto, $destino, $usuario, $emailEnvio);

            $x = '';
            foreach ($dados as $indice => $value) {
                if ($value != "null") {
                    $x .= "campo " . \App\Models\Entidades\Contato::CAMPOSINFO[$indice]['descricao'] . ": " . $value . "<br>";
                }
            }
            $info = [
                'tipo' => 1,
                'campos' => $x,
                'tabela' => \App\Models\Entidades\Contato::TABELA['descricao'],
                'descricao' => 'O Internauta efetuou o cadastro de um novo Contato'
            ];

            $this->inserirAuditoria($info);

            $retorno = [
                'status' => '1',
                'msg' => "Contato Enviado!"
            ];

            echo json_encode($retorno);
        }
    }

    public function status($status) {
        switch ($status) {
            case 1:
                return 'Lido';
                break;
            case 2:
                return 'Não Lido';
                break;
            case 0:
                return 'Excluido';
                break;

            default:
                return 'Outros';
                break;
        }
    }

}
