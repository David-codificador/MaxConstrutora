<?php

namespace App\Models\DAO;

use App\Models\Entidades\Administrador;

class AdministradorDAO extends BaseDAO {

    function selecionar($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug = null) {

        $resultado = $this->select($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug);

        if ($resultado) {

           $administrador_obj = null;

                foreach ($resultado as $v) {
                    $administrador_obj = new Administrador($v);
                }
            
                return $administrador_obj;
            } else {
                return FALSE;
            }
    }

    public function listar($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug = null) {
        $resultado = $this->select($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug);

        if ($resultado) {

            $administrador_obj = [];

            foreach ($resultado as $v) {
                $administrador_obj[] = new Administrador($v);
            }

            return $administrador_obj;
        } else {
            return FALSE;
        }
    }

    public function alterar($tabela, $dados, $condicao, $valorCondicao, $quantidade, $debug = null) {

        $administrador = $this->selecionarVetor($tabela, ["*"], $quantidade, null, $condicao, $valorCondicao, null, $debug);
        if ($administrador) {

            $dados_alterar = array();
            foreach ($administrador as $indice => $valor) {
                $dados_alterar[$indice] = !isset($dados[$indice]) ? $valor : $dados[$indice];
            }

            $resultado = $this->update($tabela, $dados, $condicao, $valorCondicao, $quantidade, $debug);

            if ($resultado) {
                return $administrador;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
