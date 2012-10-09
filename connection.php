<?

function __autoload($classe){
    
    if(file_exists("app.ado/{$classe}.class.php")){
        include_once "app.ado/{$classe}.class.php";
    }
}

$sql_select = new TSqlSelect;
$sql_select->setEntity("pessoa");
$sql_select->addColumn("nome");
$sql_select->addColumn("idade");

$criteria = new TCriteria;
//$criteria->add(new TFilter("pessoa","=","2"));

$sql_select->setCriteria($criteria);



$sql_select2 = new TSqlSelect;
$sql_select2->setEntity("my_table");
$sql_select2->addColumn("title");
$sql_select2->addColumn("body");

//$criteria2 = new TCriteria;
//$criteria2->add(new TFilter("id","=","1"));

//$sql_select2->setCriteria($criteria2);


$sql_insert = new TSqlInsert;
$sql_insert->setEntity("my_db.my_table");
$sql_insert->setRowData("title","Barbosa");
$sql_insert->setRowData("body","sdfsdf");


try{
    
    $conn = TConnection::open("pg_conf");

    $result = $conn->query($sql_select->getInstruction());
    
    TTransaction::setLogger(new TLoggerXML('pages/log.xml'));
    TTransaction::log("Postgres ".$sql_select->getInstruction(),0);
    
    xdebug_var_dump($result);
    if($result){
        while($row = $result->fetch(PDO::FETCH_OBJ)){
            echo "{$row->nome} - {$row->idade}<br />\n";
        }
    }
    
    $conn = null;
}catch(PDOException $e){
    print "Erro!".$e->getMessage()."<br />\n";
    die();
}

try{
    
    $conn = TConnection::open("my_conf");
    
    
    TTransaction::setLogger(new TLoggerXML('pages/log.xml'));
    TTransaction::log("MySql ".$sql_select2->getInstruction(),0);
    
    $result = $conn->query($sql_select2->getInstruction());
    
    $result2 = $conn->query($sql_insert->getInstruction());
    
    xdebug_var_dump($result);
    
    xdebug_var_dump($result2);
    
    
    if($result){
       
        while($row = $result->fetch(PDO::FETCH_OBJ))
        echo "{$row->title} - {$row->body}<br />\n";
    }
    
    $conn = null;
}catch(PDOException $e){
    print "Erro!".$e->getMessage()."<br />\n";
    die();
}

