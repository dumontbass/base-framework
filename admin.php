<?
function __autoload($classe){       
    
   //$classe = strtolower($classe);
    
    if(file_exists("app.ado/{$classe}.class.php")){
       
        include_once "app.ado/{$classe}.class.php";
    }elseif(file_exists("app.widgets/{$classe}.class.php")){
        include_once "app.widgets/{$classe}.class.php";
    }
        
                           
}
session_start();
var_dump($_SESSION);




$uri = $_GET["p"]?$_GET["p"]:'home';

$page =  new Page("admin_index");

$panel = new TPanel(200,200,'#ddd','id');
$page->addTag('TTags');  
        
$page->toString($panel->__toString());







