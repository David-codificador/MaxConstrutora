<?php

namespace App\Models\BO;

use App\Lib\Sessao;


abstract class BaseBO {

    public function sql($sql) {
        $dao = $this->instanciaDAO();

        return $dao->sql($sql);
    }

    //insere registros 
    public function inserir($tabela = null, $dados = null, $campos = [], $debug = null) {
        $dao = $this->instanciaDAO();
        if ($tabela == null || trim($tabela) == '') {
            return false;
        }

        foreach ($campos as $campo => $info) {
            if ($info['obrigatorio']) {
                if (trim($dados["$campo"]) == '') {
                    Sessao::gravaMensagem("Campo: " . $info['descricao'] . ", não preenchido!", "Falha ao inserir registro", 2);
                    return false;
                }
            }

            if ($info['tamanho'] != false && strlen($dados["$campo"]) > $info['tamanho']) {
                Sessao::gravaMensagem("Campo: " . $info['descricao'] . ", longo demais!", "Falha ao inserir registro", 2);
                return false;
            }
        }
        return $dao->insert($tabela, $dados, $debug);
    }

    //edita apenas um registro da tabela
    public function editar($tabela = null, $dados = [], $condicao = null, $valorCondicao = [], $quantidade = 1, $campos = [], $debug = null) {
        $dao = $this->instanciaDAO();

        if ($tabela == null || trim($tabela) == '') {
            return false;
        }

        foreach ($dados as $campo => $info) {
            if ($campos[$campo]['obrigatorio']) {
                if (trim($dados[$campo]) == '') {
                    Sessao::gravaMensagem("Campo: " . $info['descricao'] . ", não preenchido!", "Falha ao inserir registro", 2);
                    return false;
                }
            }

            if ($dados[$campo] != 'null') {
                if ($campos[$campo]['tamanho'] != false && strlen($dados[$campo]) > $campos[$campo]['tamanho']) {
                    Sessao::gravaMensagem("Campo: " . $info['descricao'] . ", longo demais!", "Falha ao inserir registro", 2);
                    return false;
                }
            }
        }

        $original = $dao->selecionarVetor($tabela, ['*'], $quantidade, null, $condicao, $valorCondicao, null);
        $resposta = $dao->alterar($tabela, $dados, $condicao, $valorCondicao, $quantidade, $debug);

        if ($resposta) {
            return $original;
        } else {
            return false;
        }
    }

    //lista todos os registros da tabela 
    public function listar($tabela = null, $campos = ["*"], $quantidade = null, $pagina = null, $condicao = null, $valorCondicao = null, $orderBy = null, $debug = null) {
        $dao = $this->instanciaDAO();

        if ($tabela == null || trim($tabela) == '') {
            return false;
        }

        return $dao->listar($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug);
    }

    
    //seleciona apenas um registro da tabela
    public function selecionar($tabela = null, $campos = ["*"], $condicao = null, $valorCondicao = null, $orderBy = null, $debug = null) {
        $dao = $this->instanciaDAO();

        if ($tabela == null || trim($tabela) == '') {
            return false;
        }

        return $dao->selecionar($tabela, $campos, 1, 0, $condicao, $valorCondicao, $orderBy, $debug);
    }

    //exclui apenas um registro da tabela
    public function excluir($tabela = null, $condicao = null, $valorCondicao = [], $quantidade = 1, $debug = null) {
        $dao = $this->instanciaDAO();

        if ($tabela == null || trim($tabela) == '') {
            return false;
        }

        $original = $dao->selecionarVetor($tabela, ['*'], $quantidade, null, $condicao, $valorCondicao, null);
        $resposta = $dao->delete($tabela, $condicao, $valorCondicao, $quantidade, $debug);

        if ($resposta) {
            return $original;
        } else {
            return false;
        }
    }

        public function listarVetor($tabela = null, $campos = ["*"], $quantidade = null, $pagina = null, $condicao = null, $valorCondicao = null, $orderBy = null, $debug = null){
        $dao = $this->instanciaDAO();

        if($tabela == null || trim($tabela) == ''){
            return false;
        }   

        return $dao->listarVetor($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug); 
    }
    
    public function selecionarVetor($tabela = null, $campos = ["*"], $condicao = null, $valorCondicao = null, $orderBy = null, $debug = null){
        $dao = $this->instanciaDAO();

        if($tabela == null || trim($tabela) == ''){
            return false;
        }   

        return $dao->selecionarVetor($tabela, $campos, 1, 0, $condicao, $valorCondicao, $orderBy, $debug); 
    }
    
}
