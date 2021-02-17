<?php
    //Caminho de inclusão do arquivo com o namespace
    namespace App\Models\BO;
    
    //Caminho para Inclusão de arquivos usados
    use App\Models\DAO\ServicosDAO;
    
    //Classe: mesmo nome do arquivo criado.
    class ServicosBO extends BaseBO{
        public function instanciaDAO(){
            return new ServicosDAO();
        }
        
    }
?>