<?

function __autoload($classe){       

	
	
	$dir = opendir(getcwd());
	while ($nome_itens = readdir($dir)) 
		if(preg_match('/^app/', $nome_itens))
			if(file_exists("$nome_itens/{$classe}.class.php"))
				include_once "$nome_itens/{$classe}.class.php";
		
		                   
}
var_dump($_POST);


$sql_select2 = new TSqlSelect;
$sql_select2->setEntity("tratamentos");
$sql_select2->addColumn("nome");
$sql_select2->addColumn("id");

$criteria2 = new TCriteria;
$criteria2->add(new TFilter("nome","like","'%{$_POST['id']}'"));

$sql_select2->setCriteria($criteria2);

try{
    
    $conn = TConnection::open("my_conf");
    
    
    TTransaction::setLogger(new TLoggerXML('pages/log.xml'));
    TTransaction::log("MySql ".$sql_select2->getInstruction(),0);
    
    $result = $conn->query($sql_select2->getInstruction());
    
    var_dump($result);
    
    if($result){
       
        while($row = $result->fetch(PDO::FETCH_OBJ))
        echo "{$row->nome} - {$row->id}<br />\n";
    }
    
    $conn = null;
}catch(PDOException $e){
    print "Erro!".$e->getMessage()."<br />\n";
    die();
}


?>









