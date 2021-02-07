<?php

namespace App\Models\DAO;

use App\Models\Entidades\Auditoria;

class AuditoriaDAO extends BaseDAO {

    function selecionar($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug = null) {

        $resultado = $this->select($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug);

        if ($resultado) {

           $auditoria_obj = null;

                foreach ($resultado as $v) {
                    $auditoria_obj = new Auditoria($v);
                }
            
                return $auditoria_obj;
            } else {
                return FALSE;
            }
    }

    public function listar($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug = null) {
        $resultado = $this->select($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug);

        if ($resultado) {

            $auditoria_obj = [];

            foreach ($resultado as $v) {
                $auditoria_obj[] = new Auditoria($v);
            }

            return $auditoria_obj;
        } else {
            return FALSE;
        }
    }

    public function alterar($tabela, $dados, $condicao, $valorCondicao, $quantidade, $debug = null) {

        $auditoria = $this->selecionarVetor($tabela, ["*"], $quantidade, null, $condicao, $valorCondicao, null, $debug);
        if ($auditoria) {

            $dados_alterar = array();
            foreach ($auditoria as $indice => $valor) {
                $dados_alterar[$indice] = !isset($dados[$indice]) ? $valor : $dados[$indice];
            }

            $resultado = $this->update($tabela, $dados, $condicao, $valorCondicao, $quantidade, $debug);

            if ($resultado) {
                return $auditoria;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
