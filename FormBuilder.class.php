<?php

require_once 'DBConnection.class.php';


class ClassBuilder{
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
    
    public function make() { //Aqui temos a função make, principal responsável por gerar meu arquivo que conterá determinada classe
        // echo "<hr>".$this->getSchemaName();
        $tables = $this->listTables($this->getSchemaName());  // Essa variável armazena o método que lista as tabelas do meu DB e passamos como parâmetro, o getter que me retorna o nome do meu Banco de Dados, o qual é necessário na minha consulta do list tables
        $strOut = ""; // Basicamente é uma variável relacionada a saída de strings, ou seja, será responsável pela saída dos meus textos, os quais serão importantes para gerar o conteúdo da class
        while ($linhaAtualTables = mysqli_fetch_assoc($tables)) {// Aqui podemos observar que enquanto a variável linhaAtualTables for recebendo a quantidade de linhas presentes na matriz associativa que se refere as tabelas, esse while será executado
            
            $tableName = $linhaAtualTables['TABLE_NAME']; //Essa variável vai armazenar cada uma das tabelas, sendo que ela utiliza o linha atual das tabelas unido à coluna table name do sql para conseguir acessar cada um dos itens presentes nessa matriz
            //  echo "<hr> TABLE_NAME:" . $tableName;
            $strOut .= "<?php";
            $strOut .= "\n\t"."class ". ucfirst($tableName) ." {\n";
            $columnsData = $this->listTableColumns( $tableName );
            $columns = array();  //Da linha 68 à 71 está sendo realizada a primeira parte da nossa classe, ou seja, estamos gerando o título da classe e depois armazenando os titulos das colunas das respectivas classes, utilizando o listar colunas das tabelas e passando a variável que armazena o nome específico da tabela necessária. O columns recebe a função array(), que gera uma matriz e me permite trabalhar com as colunas, já que estarão dispostas em um array associativo
            
            while ($linhaColumns = mysqli_fetch_assoc($columnsData)) { //Lembrando que isso só será executado enquanto ainda houver uma  quantidade de linhas da matriz para ser retornada e se refere aos titulos das colunas da classe que está sendo criada. Agora chegou a hora de criar os atributos da minha classe e as colunas da minha classe serão esses atributos
                array_push($columns, $linhaColumns['COLUMN_NAME']);//Esse array push me permite empurrar os valores presentes em linhaColumns para o meu array criado na variável columns, ou seja, agora nós temos efetivamente uma matriz associativa com todos os títulos das colunas da tabela criada inicialmente
            }
            
            for ($i=0; $i < count($columns); $i++){
                $strOut .= "\n\t\t"."private $". ($columns[$i]) .";";//Nesse loop estão sendo criados os atributos da classe com base na quantidade de colunas existentes
            }
            
            $strOut .= "\n\n\t\t"."function __construct( $". (implode(", $", $columns)) ."){"; //Aqui estamos criando o construct da nossa classe, ou seja, o primeiro script a ser executado pelo servidor e nele vamos passar a variável columns que está armazenando os parâmetros que futuramente serão alteradas pelo form
            for ($i=0; $i < count($columns); $i++){ //Esse for basicamente vai criar os sets dos respectivos atributos que serão manipulados pelo objeto que receberá os posts vindos do formulário
                $strOut .= "\n\t\t\t ".'$this->set'.ucfirst($columns[$i])."( $".($columns[$i])." );"; // O .= é o mesmo que fazer $strOut = $strOut + "Outras informações". Lembrando que o uc first faz o caracter inicial ser maiusculo
            }
            $strOut .= "\n\t\t}\n"; //Quebra de linha e tabs
            
            $strOut .= "\n\t\t"."public function toArray(){"; //Aqui estamos fazendo uso da mesma variável responsável pela saída de strings e nesse caso vamos criar uma função que exibe o valor dos atributos da classe, através de um get, em formato de matriz. O nome é bem auto explicativo "para Matriz"
            $strOut .= "\n\t\t\t return array(";
            for ($i=0; $i < count($columns); $i++){
                $strOut .= "\n\t\t\t\t ".'$this->get'.ucfirst($columns[$i])."()"; //Aqui temos os gets de cada um dos meus atributos
                $strOut .= ((($i+1) == count($columns))?"":","); //e esse daqui é um dos verificadores mais importantes, pq ele analisa o elemento sucessor do meu index e iguala ele a quantidade de classes, sendo que se o get sucessor for o último, não acrescenta ",", mas se ele não for, deve ser acrescentado ","
            }
            $strOut .= "\n\t\t\t);";
            $strOut .= "\n\t\t}\n";
            
            
            $strOut .= "\n\t\t"."public function toString(){";
            $strOut .= "\n\t\t\t return(";
            $strOut .= '"\n\t\t\t\t". implode(", ",$this->toArray()));'; //Coloca os valores da string separados por "," que é o mesmo que ter os dados presentes nos meus gets organizados em formato de string
            $strOut .= "\n\t\t}\n";
            
            for ($i=0; $i < count($columns); $i++){
                $strOut .= "\n\t\t"."public function set".ucfirst($columns[$i]) ."( $".($columns[$i]) ." ){";
                $strOut .= "\n\t\t\t ".'$this->'.($columns[$i]) ." = $".($columns[$i]) .";" ;  //set
                $strOut .= "\n\t\t}\n";
                
                $strOut .= "\n\t\t"."public function get".ucfirst($columns[$i]) ."(){";
                $strOut .= "\n\t\t\t ".' return( $this->'.($columns[$i]) ." );"; //get
                $strOut .= "\n\t\t}\n";
                
            }
            $strOut .= "\n\t}\n";
            $strOut .= "\n\n?>";
            $filename =  $this->getPath()."/".ucfirst($tableName).".class.php"; //Essa variável me traz o caminho do arquivo e o seu nome com letra maiúscula
            file_put_contents($filename, $strOut); //Isso daqui escreve dados dentro de um arquivo, ou seja, vai utilizar o filename para escrever seu caminho e o titulo do arquivo e o strout é a variável que armazenou toda a saída strings e vai repassar pro arquivo class.php
            
            $strOut = ""; //depois eu deixo ela nula para que não ocorra conflito e o processo possa ser feito com outras classes
            
        }
        $this->instrucao();
        
    }
    
    public function instrucao() {
        echo "\n <br>Não se esqueça de alterar os dados de conexão no arquivo 'DBConnection.class.php'";
        echo "\n <br>Para Manipular corretamenta os arquivos adicione seu usuário ao grupo do Apache:";
        echo "<pre>\n\t\t".'sudo adduser $USER www-data;</pre>';
        echo "\n Arquivos gerados em ". getcwd().$this->path;
        
        
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

$classBuilder = new ClassBuilder("classes", "lojinha");
$classBuilder->make();


?>