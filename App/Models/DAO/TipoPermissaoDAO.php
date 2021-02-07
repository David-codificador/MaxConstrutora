<?php

namespace App\Models\DAO;

use App\Models\Entidades\TipoPermissao;

class TipoPermissaoDAO extends BaseDAO {

    function selecionar($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug = null) {

        $resultado = $this->select($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug);

        if ($resultado) {

           $tipoPermissao_obj = null;

                foreach ($resultado as $v) {
                    $tipoPermissao_obj = new TipoPermissao($v);
                }
            
                return $tipoPermissao_obj;
            } else {
                return FALSE;
            }
    }

    public function listar($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug = null) {
        $resultado = $this->select($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug);

        if ($resultado) {

            $tipoPermissao_obj = [];

            foreach ($resultado as $v) {
                $tipoPermissao_obj[] = new TipoPermissao($v);
            }

            return $tipoPermissao_obj;
        } else {
            return FALSE;
        }
    }

    public function alterar($tabela, $dados, $condicao, $valorCondicao, $quantidade, $debug = null) {

        $tipoPermissao = $this->selecionarVetor($tabela, ["*"], $quantidade, null, $condicao, $valorCondicao, null, $debug);
        if ($tipoPermissao) {

            $dados_alterar = array();
            foreach ($tipoPermissao as $indice => $valor) {
                $dados_alterar[$indice] = !isset($dados[$indice]) ? $valor : $dados[$indice];
            }

            $resultado = $this->update($tabela, $dados, $condicao, $valorCondicao, $quantidade, $debug);

            if ($resultado) {
                return $tipoPermissao;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
