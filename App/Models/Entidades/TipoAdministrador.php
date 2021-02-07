<?php

//Caminho para inclusão do arquivo com o namespace

namespace App\Models\Entidades;

//Classe
class TipoAdministrador {

    //Constante com informações de nome e descrição da tabela referente a está classe
    const TABELA = ['nome' => 'tipo_administrador', 'descricao' => 'Tipo de administrador'];
    //Campos existentes na tambela desta classe
    const CAMPOS = ['id', 'tipo', 'status'];
    //Informaçõs sobre os campos da tabela
    const CAMPOSINFO = [
        'id' => ['tamanho' => null, 'obrigatorio' => false, 'descricao' => 'id'],
        'tipo' => ['tamanho' => 50, 'obrigatorio' => true, 'descricao' => 'tipo'],
        'status' => ['tamanho' => 2, 'obrigatorio' => true, 'descricao' => 'status']
    ];

    //Variáveis privadas referentes aos campos da tabela
    private $id;
    private $tipo;
    private $status;

    //Construtor da classe, onde os arrays de informações são montados
    public function __construct($dados = null) {
        if ($dados != null) {
            foreach ($this as $indice => $valor) {
                $this->$indice = isset($dados[$indice]) ? $dados[$indice] : null;
            }
        }
    }

    //Funções de set e get
    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}
