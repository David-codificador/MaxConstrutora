<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\Entidades\Canvas;

class BannerController extends Controller {

    public function index() {
        $this->validaAdministrador();

        $this->redirect('banner/listar');
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

        ';

        $this->render("banner/cadastro", "Cadastro de banner", $css, $js, 1);
        Sessao::limpaFormulario();
    }

    public function inserir() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $bo = new \App\Models\BO\BannerBO();
        $vetor = $_POST;
        $dados = array();
        $campus = \App\Models\Entidades\Banner::CAMPOS;

        Sessao::gravaFormulario($vetor);
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

        $dados['contador_banner'] = $this->contador_banner($vetor['contador_banner']);
        $dados['administrador_id'] = Sessao::getAdministrador('id');

        if ($_FILES["imagem"]["name"] != "") {
            $tmp_nome = $_FILES["imagem"]['tmp_name'];
            $nome_envio = $_FILES["imagem"]['name'];

            $ext = strtolower(strrchr($nome_envio, "."));

            $nome = date('d_m_Y_h_i_s') . "_" . rand(111, 222) . $ext;

            //Fazer o Upload
            move_uploaded_file($tmp_nome, './public/imagemSite/banners/' . $nome);
            if (file_exists('./public/imagemSite/banners/' . $nome)) {

                $img = new Canvas();

                $img->carrega('./public/imagemSite/banners/' . $nome)
                        ->hexa('#FFFFFF')
                        ->redimensiona(1920, 780, 'preenchimento')
                        ->grava('./public/imagemSite/banners/' . $nome, 80);

                $dados['imagem'] = $nome;
            } else {
                Sessao::gravaMensagem("Falha ao enviar Banner ", "Banner  não enviado", 2);
                $this->redirect('banner/cadastro');
            }
        } else {
            Sessao::gravaMensagem("Falha ao enviar foto", "Imagem não enviada", 2);
            $this->redirect('banner/cadastro');
        }

        $id = $bo->inserir(\App\Models\Entidades\Banner::TABELA['nome'], $dados, \App\Models\Entidades\Banner::CAMPOSINFO, true);


        if ($id == FALSE) {
            if (!Sessao::existeMensagem()) {
                Sessao::gravaMensagem("Falha", "Verifique todos os campos e tente novamente", 2);
            }

            $this->redirect('banner/cadastro');
        } else {

            unset($dados['administrador_id']);
            unset($dados['imagem']);

            $x = '';
            foreach ($dados as $indice => $value) {
                if ($value != "null") {
                    $x .= "campo " . \App\Models\Entidades\Banner::CAMPOSINFO[$indice]['descricao'] . ": " . $value . "<br>";
                }
            }

            $x .= '<img src="' . IMAGEMSITE . 'banners/' . $nome . '" style="width: 100%">';


            $info = [
                'tipo' => 1,
                'administrador' => Sessao::getAdministrador('id'),
                'campos' => $x,
                'tabela' => \App\Models\Entidades\Banner::TABELA['descricao'],
                'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou o cadastro de um novo banner(a).'
            ];

            $this->inserirAuditoria($info);

            Sessao::limpaFormulario();
            Sessao::gravaMensagem("Sucesso", "Banner  inserido", 1);

            $this->redirect('banner/listar');
        }
    }

    public function listar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $css = '';
        $js = '';

        $bo = new \App\Models\BO\BannerBO();

        if (!is_numeric($parametro[0])) {
            $this->redirect('banner/listar/1/' . $parametro[0]);
        }
        $p = (isset($parametro[0]) or is_numeric($parametro[0])) ? $parametro[0] : 1;
        $busca = (isset($parametro[1])) ? $parametro[1] : null;

        $quantidade = 10;
        $pagina = $p * $quantidade - $quantidade;

        $condicao = "";
        $valoresCondicao = [];

        if ($busca) {
            $condicao .= "";
            array_push($valoresCondicao, "$busca");
        }

        $orderBy = "id asc";

        $tabela = \App\Models\Entidades\Banner::TABELA['nome'];

        $resultado = $bo->listarVetor($tabela, ["*"], $quantidade, $pagina, $condicao, $valoresCondicao, $orderBy);

        $this->setViewParam('banner', $resultado);

        $quanBanner = $bo->selecionar($tabela, ["count(id) as id"], null, null, $condicao, $valoresCondicao, $orderBy);

        $quanPaginas = ceil($quanBanner->getId() / $quantidade);

        if ($p > $quanPaginas and $p != 1) {
            Sessao::gravaMensagem("Falha", "Página não encontrada", 2);
            $this->redirect('banner/listar');
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
            'quanBanner' => $quanBanner->getId(),
            'quanPaginas' => $quanPaginas,
            'inicio' => $i,
            'fim' => $fim,
            'pagina' => $p,
            'anterior' => $p - 1,
            'proxima' => $p + 1,
            'busca' => $busca
        );

        $this->setViewParam('paginacao', $paginacao);

        if ($quanBanner->getId() < 1) {
            Sessao::gravaMensagem('', 'Nenhum registro encontrado!', 2);
        }

        $this->render('banner/listar', "Listagem", $css, $js, 1);
    }

    public function excluir($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $id = $parametro[0];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\BannerBO();
            $tabela = \App\Models\Entidades\Banner::TABELA['nome'];

            $resposta = $bo->excluir($tabela, "id = ?", [$id], 1);

            if ($resposta) {
                if ($resposta['imagem'] != 'padrao.jpg') {
                    unlink('./public/imagemSite/banners/' . $resposta['imagem']);
                }
                Sessao::gravaMensagem("Sucesso", "Banner(a) excluido(a)", 1);

                $info = [
                    'tipo' => 3,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => "-",
                    'tabela' => \App\Models\Entidades\Banner::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a exclusão de um banner(a): ' . $resposta['nome']
                ];

                $this->inserirAuditoria($info);
            } else {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Banner  não excluido", 2);
                }
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('banner/listar');
    }

    public function salvar() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $id = $_POST['banner'];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\BannerBO();

            $vetor = $_POST;

            $dados = array();
            $campus = \App\Models\Entidades\Banner::CAMPOS;


            foreach ($vetor as $indice => $valor) {
                if (in_array($indice, $campus)) {
                    if ($vetor[$indice] == '') {
                        $dados[$indice] = "null";
                    } else {
                        $dados[$indice] = $vetor[$indice];
                    }
                }
            }
            
            if ($vetor['status'] == "on") {
                $dados['status'] = 1;
            } else {
                $dados['status'] = 2;
            }

            $resultado = $bo->editar(\App\Models\Entidades\Banner::TABELA['nome'], $dados, "id = ?", [$id], 1, \App\Models\Entidades\Banner::CAMPOSINFO);

            if (Sessao::existeMensagem() or $resultado == FALSE) {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem($vetor['titulo'], "Banner  sem edição", 2);
                }

                $this->redirect('banner/listar');
            } else {
                $x = '';

                foreach ($dados as $indice => $value) {
                    if ($value == 'null') {
                        $value = '';
                    }

                    if ($resultado[$indice] != $value) {
                        $x .= "campo " . \App\Models\Entidades\Banner::CAMPOSINFO[$indice]['descricao'] . ' editado de: "' . $resultado[$indice] . '" para "' . $value . '"<br>';
                    }
                }

                $info = [
                    'tipo' => 2,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => $x,
                    'tabela' => \App\Models\Entidades\Banner::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a edição das informações de um(a) banner(a).'
                ];

                $this->inserirAuditoria($info);

                Sessao::gravaMensagem("Sucesso", "Banner  " . $resultado['titulo'] . ", editado", 1);

                $this->redirect('banner/listar/');
            }
        } else {

            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('banner/listar');
    }

    public function editarImagem() {
        $this->validaAdministrador();
        $this->nivelAcesso(2);
        $id = $_POST['id'];

        if (is_numeric($id)) {
            if ($_FILES["imagem"]["name"] != "") {
                $tmp_nome = $_FILES["imagem"]['tmp_name'];
                $nome_envio = $_FILES["imagem"]['name'];

                $ext = strtolower(strrchr($nome_envio, "."));

                $nome = date('d_m_Y_h_i_s') . "_" . rand(111, 222) . $ext;

                //Fazer o Upload
                move_uploaded_file($tmp_nome, './public/imagemSite/banners/' . $nome);
                if (file_exists('./public/imagemSite/banners/' . $nome)) {

                    $img = new Canvas();

                    $img->carrega('./public/imagemSite/banners/' . $nome)
                            ->hexa('#FFFFFF')
                            ->redimensiona(1920, 780, 'preenchimento')
                            ->grava('./public/imagemSite/banners/' . $nome, 80);

                    $dados['imagem'] = $nome;
                } else {
                    Sessao::gravaMensagem("Falha ao enviar Banner ", "Banner  não enviado", 2);
                    $this->redirect('banner/editar/' . $id);
                }
            } else {
                Sessao::gravaMensagem("Falha", "Banner  não selecionado", 2);
                $this->redirect('banner/editar/' . $id);
            }

            $bo = new \App\Models\BO\BannerBO();

            $resultado = $bo->editar(\App\Models\Entidades\Banner::TABELA['nome'], $dados, "id = ?", [$id], 1, \App\Models\Entidades\Banner::CAMPOSINFO);

            if (Sessao::existeMensagem() or $resultado == FALSE) {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Imagem não editada", 2);
                }

                $this->redirect('banner/editar/' . $id);
            } else {
                $x = "campo " . \App\Models\Entidades\Banner::CAMPOSINFO["imagem"]['descricao'] . ' editado de:<br><img src="' . IMAGEMSITE . 'banner/' . $resultado["imagem"] . '" /><br>para:<br><img src="' . IMAGEMSITE . 'banner/' . $nome . '" /><br>';

                $info = [
                    'tipo' => 2,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => $x,
                    'tabela' => \App\Models\Entidades\Banner::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a edição da imagem do banner(a) '
                ];

                $this->inserirAuditoria($info);

                Sessao::gravaMensagem("Sucesso", "Imagem do Banner  editado", 1);

                $this->redirect('banner/editar/' . $id);
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('banner/listar');
    }

    public function editar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $id = $parametro[0];

        if (is_numeric($id)) {

            $bo = new \App\Models\BO\BannerBO();
            $banner = $bo->selecionarVetor(\App\Models\Entidades\Banner::TABELA['nome'], ['*'], "id = ?", [$id], null);

            if ($banner) {
                $css = '
                   
                    <link rel="stylesheet" href="' . CSSTEMPLATE . '/switchery/switchery.min.css" >
                    <link rel="stylesheet" href="' . CSSTEMPLATE . '/select2/select2.min.css" >
                ';

                $js = '
                    <script src="' . JSTEMPLATE . 'switchery/switchery.min.js"></script>
                    <script src="' . JSTEMPLATE . 'select2/select2.min.js"></script>   
                     <script src="' . JSTEMPLATE . 'jquery.mask.js"></script>
               ';

                $this->setViewParam('item', $banner);

                $this->render('banner/editar', $banner['titulo'], $css, $js, 1);
            } else {
                Sessao::gravaMensagem("Falha", "Banner não encontrado", 2);
                $this->redirect('banner/listar');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
            $this->redirect('banner/listar');
        }
    }

    public function contador_banner($contador_banner) {
        switch ($contador_banner) {
            case 1:
                return "01";
                break;
            case 2:
                return "02";
                break;
            case 3:
                return "03";
                break;
            default:
                return "|";
                break;
        }
    }

}
