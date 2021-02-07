<?php

namespace App\Models\DAO;

use App\Models\Entidades\TipoAdministrador;

class TipoAdministradorDAO extends BaseDAO {

    function selecionar($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug = null) {

        $resultado = $this->select($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug);

        if ($resultado) {

           $tipoAdministrador_obj = null;

                foreach ($resultado as $v) {
                    $tipoAdministrador_obj = new TipoAdministrador($v);
                }
            
                return $tipoAdministrador_obj;
            } else {
                return FALSE;
            }
    }

    public function listar($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug = null) {
        $resultado = $this->select($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug);

        if ($resultado) {

            $tipoAdministrador_obj = [];

            foreach ($resultado as $v) {
                $tipoAdministrador_obj[] = new TipoAdministrador($v);
            }

            return $tipoAdministrador_obj;
        } else {
            return FALSE;
        }
    }

    public function alterar($tabela, $dados, $condicao, $valorCondicao, $quantidade, $debug = null) {

        $tipoAdministrador = $this->selecionarVetor($tabela, ["*"], $quantidade, null, $condicao, $valorCondicao, null, $debug);
        if ($tipoAdministrador) {

            $dados_alterar = array();
            foreach ($tipoAdministrador as $indice => $valor) {
                $dados_alterar[$indice] = !isset($dados[$indice]) ? $valor : $dados[$indice];
            }

            $resultado = $this->update($tabela, $dados, $condicao, $valorCondicao, $quantidade, $debug);

            if ($resultado) {
                return $tipoAdministrador;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
