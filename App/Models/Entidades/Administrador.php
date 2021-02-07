<?php

//Caminho para inclusão do arquivo com o namespace

namespace App\Models\Entidades;

//Classe
class Administrador {

    //Constante com informações de nome e descrição da tabela referente a está classe
    const TABELA = ['nome' => 'administrador', 'descricao' => 'Administrador'];
    //Campos existentes na tambela desta classe
    const CAMPOS = ['id', 'nome', 'foto', 'telefone', 'email', 'usuario', 'senha', 'status', 'cadastro', 'token', 'expiracao_token', 'tipo_administrador_id'];
    //Informaçõs sobre os campos da tabela
    const CAMPOSINFO = [
        'id' => ['tamanho' => null, 'obrigatorio' => false, 'descricao' => 'id'],
        'nome' => ['tamanho' => 60, 'obrigatorio' => true, 'descricao' => 'nome'],
        'foto' => ['tamanho' => 30, 'obrigatorio' => false, 'descricao' => 'foto'],
        'telefone' => ['tamanho' => 45, 'obrigatorio' => false, 'descricao' => 'telefone'],
        'email' => ['tamanho' => 200, 'obrigatorio' => false, 'descricao' => 'e-mail'],
        'usuario' => ['tamanho' => 30, 'obrigatorio' => true, 'descricao' => 'usuário'],
        'senha' => ['tamanho' => 30, 'obrigatorio' => true, 'descricao' => 'senha'],
        'status' => ['tamanho' => 2, 'obrigatorio' => true, 'descricao' => 'status'],
        'cadastro' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'data de cadastro'],
        'token' => ['tamanho' => 45, 'obrigatorio' => false, 'descricao' => 'token'],
        'expiracao_token' => ['tamanho' => null, 'obrigatorio' => false, 'descricao' => 'expiraçaõ do token'],
        'tipo_administrador_id' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'tipo do administrador']
    ];

    //Variáveis privadas referentes aos campos da tabela
    private $id;
    private $nome;
    private $foto;
    private $telefone;
    private $email;
    private $usuario;
    private $senha;
    private $status;
    private $cadastro;
    private $token;
    private $expiracao_token;
    private $tipo_administrador_id;

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

    function getNome() {
        return $this->nome;
    }

    function getFoto() {
        return $this->foto;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function getStatus() {
        return $this->status;
    }

    function getCadastro() {
        return $this->cadastro;
    }

    function getToken() {
        return $this->token;
    }

    function getExpiracao_token() {
        return $this->expiracao_token;
    }

    function getTipo_administrador_id() {
        return $this->tipo_administrador_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setCadastro($cadastro) {
        $this->cadastro = $cadastro;
    }

    function setToken($token) {
        $this->token = $token;
    }

    function setExpiracao_token($expiracao_token) {
        $this->expiracao_token = $expiracao_token;
    }

    function setTipo_administrador_id($tipo_administrador_id) {
        $this->tipo_administrador_id = $tipo_administrador_id;
    }

}
