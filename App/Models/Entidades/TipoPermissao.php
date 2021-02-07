<?php
//Caminho para inclusão do arquivo com o namespace
namespace App\Models\Entidades;

//Classe
class TipoPermissao{
    //Constante com informações de nome e descrição da tabela referente a está classe
    const TABELA = ['nome' => 'tipo_permissao', 'descricao' => 'Permissões do tipo'];
    //Campos existentes na tambela desta classe
    const CAMPOS = ['tipo_administrador_id', 'permissao_id'];
    //Informaçõs sobre os campos da tabela
    const CAMPOSINFO = [   
        'tipo_administrador_id' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'tipo do perfil de administrador'],
        'permissao_id' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'permissões']
    ];
    
    //Variáveis privadas referentes aos campos da tabela
    private $tipo_administrador_id;
    private $permissao_id;
    
    //Construtor da classe, onde os arrays de informações são montados
    public function __construct($dados = null) {
        if ($dados != null) {
            foreach( $this as $indice => $valor ) {
                $this->$indice = isset($dados[$indice]) ? $dados[$indice] : null;
            }
        }
    }
    
    //Funções de set e get
    function getTipo_administrador_id() {
        return $this->tipo_administrador_id;
    }

    function getPermissao_id() {
        return $this->permissao_id;
    }

    function setTipo_administrador_id($tipo_administrador_id) {
        $this->tipo_administrador_id = $tipo_administrador_id;
    }

    function setPermissao_id($permissao_id) {
        $this->permissao_id = $permissao_id;
    }
}