<?php
//Caminho para inclusão do arquivo com o namespace
namespace App\Models\Entidades;

//Classe
class Banner{
    //Constante com informações de nome e descrição da tabela referente a está classe
    const TABELA = ['nome' => 'banner', 'descricao' => 'Banner'];
    //Campos existentes na tambela desta classe
    const CAMPOS = ['id', 'contador_banner', 'imagem', 'titulo', 'sub_titulo', 'link', 'titulo_link', 'status', 'administrador_id'];
    //Informaçõs sobre os campos da tabela
    const CAMPOSINFO = [   
        'id' => ['tamanho' => null, 'obrigatorio' => false, 'descricao' => 'id'],
        'contador_banner' => ['tamanho' => 11, 'obrigatorio' => true, 'descricao' => 'Contador Banner'],
        'imagem' => ['tamanho' => 50, 'obrigatorio' => true, 'descricao' => 'imagem'],
        'titulo' => ['tamanho' => 45, 'obrigatorio' => false, 'descricao' => 'Título'],
        'sub_titulo' => ['tamanho' => 100, 'obrigatorio' => false, 'descricao' => 'Sub Título'],
        'link' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'Link'],
        'titulo_link' => ['tamanho' => 45, 'obrigatorio' => true, 'descricao' => 'Titulo do Link'],
        'status' => ['tamanho' => 2, 'obrigatorio' => true, 'descricao' => 'Status'],
        'administrador_id' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'tipo do administrador']
    ];
    
    //Variáveis privadas referentes aos campos da tabela
    private $id;
    private $contador_banner;
    private $imagem;
    private $titulo;
    private $sub_titulo;
    private $link;
    private $titulo_link;
    private $status;
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

    function getContador_banner() {
        return $this->contador_banner;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getSub_titulo() {
        return $this->sub_titulo;
    }

    function getLink() {
        return $this->link;
    }

    function getTitulo_link() {
        return $this->titulo_link;
    }

    function getStatus() {
        return $this->status;
    }

    function getAdministrador_id() {
        return $this->administrador_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setContador_banner($contador_banner) {
        $this->contador_banner = $contador_banner;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setSub_titulo($sub_titulo) {
        $this->sub_titulo = $sub_titulo;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setTitulo_link($titulo_link) {
        $this->titulo_link = $titulo_link;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setAdministrador_id($administrador_id) {
        $this->administrador_id = $administrador_id;
    }


}