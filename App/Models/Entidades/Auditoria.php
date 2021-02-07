<?php

//Caminho para inclusão do arquivo com o namespace

namespace App\Models\Entidades;

//Classe
class Auditoria {

    //Constante com informações de nome e descrição da tabela referente a está classe
    const TABELA = ['nome' => 'auditoria', 'descricao' => 'Auditoria'];
    //Campos existentes na tambela desta classe
    const CAMPOS = ['id', 'tipo', 'administrador', 'tabela', 'campos', 'descricao', 'data', 'ip'];
    //Informaçõs sobre os campos da tabela
    const CAMPOSINFO = [
        'id' => ['tamanho' => null, 'obrigatorio' => false, 'descricao' => 'código'],
        'tipo' => ['tamanho' => 11, 'obrigatorio' => true, 'descricao' => 'Tipo de registro'],
        'administrador' => ['tamanho' => 11, 'obrigatorio' => false, 'descricao' => 'administrador responsável pelo registro'],
        'tabela' => ['tamanho' => 50, 'obrigatorio' => false, 'descricao' => 'tabela'],
        'campos' => ['tamanho' => null, 'obrigatorio' => false, 'descricao' => 'campos'],
        'descricao' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'descrição do registro'],
        'data' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'data de cadastro'],
        'ip' => ['tamanho' => 45, 'obrigatorio' => true, 'descricao' => 'ip do usuário'],
    ];
    
    const TIPO = [
        '1' => "Inserção",
        '2' => "Alteração",
        '3' => "Exclusão",
        '4' => "Seleção",
        '5' => "Login",
        '6' => "Logoff",
        '7' => "Envio de E-mail"
        ];

    //Variáveis privadas referentes aos campos da tabela
    private $id;
    private $tipo;
    private $administrador;
    private $tabela;
    private $campos;
    private $descricao;
    private $data;
    private $ip;

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

    function getAdministrador() {
        return $this->administrador;
    }

    function getTabela() {
        return $this->tabela;
    }

    function getCampos() {
        return $this->campos;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getData() {
        return $this->data;
    }

    function getIp() {
        return $this->ip;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setAdministrador($administrador) {
        $this->administrador = $administrador;
    }

    function setTabela($tabela) {
        $this->tabela = $tabela;
    }

    function setCampos($campos) {
        $this->campos = $campos;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setIp($ip) {
        $this->ip = $ip;
    }

}
