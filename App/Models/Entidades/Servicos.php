<?php
//Caminho para inclusão do arquivo com o namespace
namespace App\Models\Entidades;

//Classe
class Servicos{
    //Constante com informações de nome e descrição da tabela referente a está classe
    const TABELA = ['nome' => 'servicos', 'descricao' => 'Serviços'];
    //Campos existentes na tambela desta classe
    const CAMPOS = ['id', 'tipo_servico', 'titulo', 'texto', 'administrador_id'];
    //Informaçõs sobre os campos da tabela
    const CAMPOSINFO = [   
        'id' => ['tamanho' => null, 'obrigatorio' => false, 'descricao' => 'id'],
        'tipo_servico' => ['tamanho' => 45, 'obrigatorio' => true, 'descricao' => 'Nome Serviço'],
        'titulo' => ['tamanho' => 50, 'obrigatorio' => true, 'descricao' => 'Título'],
        'texto' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'Texto'],
        'administrador_id' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'tipo do administrador']
        
    ];
    
    //Variáveis privadas referentes aos campos da tabela
    private $id;
    private $tipo_servico;
    private $titulo;
    private $texto;
    private $administrador_id;
    
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

    function getTipo_servico() {
        return $this->tipo_servico;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getTexto() {
        return $this->texto;
    }

    function getAdministrador_id() {
        return $this->administrador_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo_servico($tipo_servico) {
        $this->tipo_servico = $tipo_servico;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setAdministrador_id($administrador_id) {
        $this->administrador_id = $administrador_id;
    }

}