<?php

require_once 'DBConnection.class.php';


class FormBuilder{
    private $path       = ""; //Basicamente esse é o atributo da classe atrelado ao caminho (destino) dos arquivos que serão gerados
    private $schemaName = ""; //Esse atributo está relacionado ao nome do Banco de Dados que será manipulado
    private $conn       = null;//Será o responsável por instanciar a minha classe DBCONNECTION
    
    function __construct($pathDestFiles, $schemaName) { //Essa função se trata de um construt, ou seja, a primeira função executada no script e dentro dela eu passo parâmetros que serão manipulados para que eu possa gerar meus bancos de dados. $pathDesFiles se refere ao caminho onde serão guardados e o schemaName se refere a tabela criada
        $this->setPath( getcwd()."/".$pathDestFiles );//Basicamente ele "seta" o caminho, concatenando o diretório atual com a \ e posteriormente passando a variável que está armazenando o valor do caminho. No windows se usa essa /
        $this->setSchemaName( $schemaName ); //"Seto" o valor do atributo que se refere ao nome do meu DB, nesse caso é lojinha, e é essa variável que me permite acessá-lo e manipular suas tabelas para gerar uma tarefa repetitiva
        $this->setConn( new DBConnection() );// "Setando" o valor do atributo conn. Basicamente, ele tem a função de instanciar a classe DBCONNECTION e permitir que seja gerada uma conexão
        
        if ( ! file_exists( $this->getPath() )) {//Basicamente eu estou vendo se existe algum arquivo ou diretório presente no atributo path do meu objeto. Nesse caso, em específico, estou vendo se eu já tenho o diretório para meus arquivos que serão criados
            mkdir( $this->getPath(), 0777, true);//Caso não tiver diretório criado, eu crio através dessa consição
        }
    }
    
    private function listTables() {//Gerando uma função privada para listar as tabelas
        $cmdListTables = "
            SELECT  DISTINCT(TABLE_NAME)
            FROM 	information_schema.columns
            WHERE 	TABLE_SCHEMA = '".$this->getSchemaName()."'
        ";//Criei um select que pega um atributo oculto do seu arquivo .sql e nesse caso é o TABLE_NAME. Isso nos permite obter os nomes da tabela do SQL, no entanto eu pego apenas as tabelas distintas.
        //A consulta gira em torno de uma tabela que traz as informações do esquema (DB), trazendo especificamente o nome das colunas das diversas tabelas. O filtro é feito através do WHERE que vai me trazer os respectivos nomes das tabelas presentes no meu DB lojinha ou qualquer outro 
        
        $result = $this->getConn()->query($cmdListTables); //A variável result armazenára o meu getConn, sendo que o conn já é uma instancia da minha classe de conexão e dessa forma eu consigo executar o script/consulta sql escrito acima
        return ( $result ); //Retorno o valor da variável
    }
    
    
    private function listTableColumns($tableName) { //função para listar as colunas das minhas respectivas tabelas
        $cmdListTableColumns = "
	       SELECT
	           ORDINAL_POSITION,
	           COLUMN_NAME,
	           COLUMN_TYPE,
	           COLUMN_KEY,
	           COLUMN_DEFAULT,
	           IS_NULLABLE,
	           DATA_TYPE,
	           CHARACTER_MAXIMUM_LENGTH,
	           CHARACTER_OCTET_LENGTH,
	           NUMERIC_PRECISION,
	           NUMERIC_SCALE,
	           DATETIME_PRECISION,
	           CHARACTER_SET_NAME,
	           COLLATION_NAME
           FROM 	information_schema.columns
           WHERE 	TABLE_SCHEMA = '" . $this->schemaName . "'
           AND		TABLE_NAME   = '" . $tableName  . "'
           ORDER BY ORDINAL_POSITION
        ";//Basicamente essa é uma consulta repleta de filtros para que me traga todas as respectivas colunas das tabelas do meu DB. Mais uma vez eu utlizo a tabela coulta que me traz as informações do esquema e nesse caso eu busco as colunas onde tanto o nome da tabela quanto o nome do DB corresponderem
        $result = $this->getConn()->query($cmdListTableColumns);//A variável result armazenára o meu getConn, sendo que o conn já é uma instancia da minha classe de conexão e dessa forma eu consigo executar o script/consulta sql escrito acima
        return ( $result );//retorna o valor da variável
    }
    
    public function makeForm() { 
    
        $tables = $this->listTables();
        var_dump($tables);
        $strOut = ""; 
        while ($linhaAtualTables = mysqli_fetch_assoc($tables)) {

            $strOut .= "<!DOCTYPE html>";
            $strOut .=  "\n". "<html lang='pt-br'>";
            $strOut .=  "\n"."<head>";
            $strOut .=  "\n\t"."<title>Form PHP</title>";
            $strOut .=  "\n\t"."<meta charset='utf-8'>";
            $strOut .=  "\n\t"."<meta name='viewport' content='width=device-width, initial-scale=1'>";
            $strOut .=  "\n\t"."<meta name='viewport' content='width=device-width, initial-scale=1'>";
            $strOut .=  "\n\t"."<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>";
            $strOut .=  "\n\t"."<script src='https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js'></script>";
            $strOut .=  "\n\t"."<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>";
            $strOut .=  "\n\t"."<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js'></script>";
            $strOut .=  "\n\t"."<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>";
            $strOut .=  "\n"."</head>";

            $tableName = $linhaAtualTables['TABLE_NAME'];

            $strOut.= "\n"."<body>"."\n\t"."<div class='container m-5 p-5'>"."\n\t\t"."<h2>Insert form</h2>"."\n\t\t"."<form action='' method='post' "." id= ". ucfirst($tableName). ">" ;
            
             //Essa variável vai armazenar cada uma das tabelas, sendo que ela utiliza o linha atual das tabelas unido à coluna table name do sql para conseguir acessar cada um dos itens presentes nessa matriz
            //echo "<hr> TABLE_NAME:" . $tableName;
            $columnsData = $this->listTableColumns( $tableName );
            //var_dump($columnsData);
            $columns = array();  

            while ($linhaColumns = mysqli_fetch_assoc($columnsData)) { //Lembrando que isso só será executado enquanto ainda houver uma  quantidade de linhas da matriz para ser retornada e se refere aos titulos das colunas da classe que está sendo criada. Agora chegou a hora de criar os atributos da minha classe e as colunas da minha classe serão esses atributos
                array_push($columns, $linhaColumns['COLUMN_NAME']);
                echo $linhaColumns['COLUMN_TYPE']."<br><br>";   

                for ($i=0; $i < count($columns); $i++){
                    $strOut.="\n\t\t\t"."<div class='form-group'>"."\n\t\t\t\t"."<label for='desc'>". ucfirst($linhaColumns['COLUMN_NAME']) ."</label>";

                    switch (strtolower($linhaColumns['DATA_TYPE'])) {
                        case 'int':
                            $strOut.= "\n\t\t\t\t"."<input type= 'number' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        
                        case 'varchar':
                            $strOut.= "\n\t\t\t\t"."<input type= 'text' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
    
                        case 'date':
                            $strOut.= "\n\t\t\t\t"."<input type= 'date' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        case 'decimal':
                            $strOut.= "\n\t\t\t\t"."<input type= 'number' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        case 'text':
                            $strOut.= "\n\t\t\t\t"."<input type= 'text' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        case 'datetime':
                            $strOut.= "\n\t\t\t\t"."<input type= 'date' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        case 'char':
                            $strOut.= "\n\t\t\t\t"."<input type= 'text' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        case 'longtext':
                            $strOut.= "\n\t\t\t\t"."<input type= 'text' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        case 'bigint':
                            $strOut.= "\n\t\t\t\t"."<input type= 'number' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        case 'tinyint':
                            $strOut.= "\n\t\t\t\t"."<input type= 'number' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        case 'smallint':
                            $strOut.= "\n\t\t\t\t"."<input type= 'number' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        case 'double':
                            $strOut.= "\n\t\t\t\t"."<input type= 'number' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        case 'enum':
                            $strOut.= "\n\t\t\t\t"."<input type= 'text' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        case 'mediumtext':
                            $strOut.= "\n\t\t\t\t"."<input type= 'number' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break;
                        case 'time':
                            $strOut.= "\n\t\t\t\t"."<input type= 'time' class='form-control' id= '".$linhaColumns['COLUMN_NAME']."'  name='".$linhaColumns['COLUMN_NAME']."'></div>";
                            break; 
                    }      

                }    
            }    
        }
            $strOut.= "\n\t\t\t"."<button type='submit' class='btn btn-dark' id='btn-confirma'>Submit</button>". "\n\t\t"."</form>"."\n\t"."</div>"."\n"."</body>"."\n"."</html>";   
            $filename =  $this->getPath()."/".ucfirst($tableName).".form.php"; 
            file_put_contents($filename, $strOut);
            $strOut = "";
    }
    
    
    public function getPath(){
        return $this->path;
    }

    public function setPath($path){
        $this->path = $path;
    }

    public function getSchemaName(){
        return $this->schemaName;
    }

    public function setSchemaName($schemaName){
        $this->schemaName = $schemaName;
    }

    public function getConn(){
        return $this->conn;
    }

    public function setConn($conn){
        $this->conn = $conn;
    }

}

// Testando ClassBuilder.class.php


$class = new FormBuilder("forms", "lojinha");
$class->makeForm();

?>