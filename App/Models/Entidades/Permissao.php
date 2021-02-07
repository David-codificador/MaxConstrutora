<?php
//Caminho para inclusão do arquivo com o namespace
namespace App\Models\Entidades;

//Classe
class Permissao{
    //Constante com informações de nome e descrição da tabela referente a está classe
    const TABELA = ['nome' => 'permissao', 'descricao' => 'Permissões'];
    //Campos existentes na tambela desta classe
    const CAMPOS = ['id', 'permissao', 'nivel', 'status'];
    //Informaçõs sobre os campos da tabela
    const CAMPOSINFO = [   
        'id' => ['tamanho' => null, 'obrigatorio' => false, 'descricao' => 'id'],
        'permissao' => ['tamanho' => 50, 'obrigatorio' => true, 'descricao' => 'permissão'],
        'nivel' => ['tamanho' => 2, 'obrigatorio' => true, 'descricao' => 'nível'],
        'status' => ['tamanho' => 2, 'obrigatorio' => true, 'descricao' => 'status']
    ];
    
    //Variáveis privadas referentes aos campos da tabela
    private $id;
    private $permissao;
    private $nivel;
    private $status;
    
    //Construtor da classe, onde os arrays de informações são montados
    public function __construct($dados = null) {
        if ($dados != null) {
            foreach( $this as $indice => $valor ) {
                $this->$indice = isset($dados[$indice]) ? $dados[$indice] : null;
            }
        }
    }
    
    //Funções de set e get
    function getId() {
        return $this->id;
    }

    function getPermissao() {
        return $this->permissao;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPermissao($permissao) {
        $this->permissao = $permissao;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setStatus($status) {
        $this->status = $status;
    }
}