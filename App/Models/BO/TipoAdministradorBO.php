<?php
    //Caminho de inclusão do arquivo com o namespace
    namespace App\Models\BO;
    
    //Caminho para Inclusão de arquivos usados
    use App\Models\DAO\TipoAdministradorDAO;
    
    //Classe: mesmo nome do arquivo criado.
    class TipoAdministradorBO extends BaseBO{
        public function instanciaDAO(){
            return new TipoAdministradorDAO();
        }
        
    }
?>