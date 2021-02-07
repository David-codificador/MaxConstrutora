<?php
//Caminho para inclusão do arquivo com o namespace
namespace App\Models\Entidades;

//Classe
class Contato{
    //Constante com informações de nome e descrição da tabela referente a está classe
    const TABELA = ['nome' => 'contato', 'descricao' => 'Contato'];
    //Campos existentes na tambela desta classe
    const CAMPOS = ['id', 'nome', 'telefone', 'email', 'assunto', 'status'];
    //Informaçõs sobre os campos da tabela
    const CAMPOSINFO = [   
        'id' => ['tamanho' => null, 'obrigatorio' => false, 'descricao' => 'id'],
        'nome' => ['tamanho' => 60, 'obrigatorio' => true, 'descricao' => 'Nome'],
        'telefone' => ['tamanho' => 45, 'obrigatorio' => true, 'descricao' => 'Telefone'],
        'email' => ['tamanho' => 200, 'obrigatorio' => false, 'descricao' => 'Email'],
        'assunto' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'Assunto'],
        'status' => ['tamanho' => 2, 'obrigatorio' => true, 'descricao' => 'Status'],
        
    ];
    
    //Variáveis privadas referentes aos campos da tabela
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $assunto;
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

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getAssunto() {
        return $this->assunto;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setAssunto($assunto) {
        $this->assunto = $assunto;
    }

    function setStatus($status) {
        $this->status = $status;
    }



}