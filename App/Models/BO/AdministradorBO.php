<?php
    //Caminho de inclusão do arquivo com o namespace
    namespace App\Models\BO;
    
    //Caminho para Inclusão de arquivos usados
    use App\Models\DAO\AdministradorDAO;
    
    //Classe: mesmo nome do arquivo criado.
    class AdministradorBO extends BaseBO{
        public function instanciaDAO(){
            return new AdministradorDAO();
        }
        
    }
?>