<?
/**
 * 
 * 
 * 
 */ 
class TTags{
    
    public $name;
    
    /**
     * Cannot instantiate
     */ 
    public function __construct(){ }
        
    
    /**
     * 
     * Seleciona o modelo de tags
     * @param unknown_type $file
     * @param unknown_type $k
     * @param unknown_type $v
     */
    public  function customTags(&$file,$k, $v){
        
        preg_match_all('/<'.$v.':\s*([^>]*)\s*\/?>/', $file, $customTags, PREG_SET_ORDER);
        
      
        
        foreach ($customTags as $k=>$customTag) {
            
            $originalTag=$customTag[0];
            $rawAttributes=$customTag[1];
            
            preg_match_all('/([^=\s]+)="([^"]+)"/', $rawAttributes, $attributes, PREG_SET_ORDER);
            
           
            foreach ($attributes as $attribute) {
                
                $name=$attribute[1];
                $value=$attribute[2];
                $formatedAttributes[$name]=$value;
      
            }
            try{
          
                preg_replace($originalTag, self::$value(), &$file);
           
            }catch(Exception $e){
                echo "Error ".$e;
            }
        
        }
    }
    
    
    
    /**
     * void
     * lista os arquivos da pasta pages/
     * 
     */
     public static function listaPages($camel=false){ 
        //$pages = array();
        $dir = opendir(dirname(__DIR__)."/pages");
        $aux = "";
        while($entry = readdir($dir)){
           
          if (preg_match('/page/',$entry)){
                if($camel) strtoupper($entry);
                $entry  = preg_replace("/.page.html/","",$entry);
               
                $aux .= "\n\t<a href=\"{$_SERVER['PHP_SELF']}?p=$entry\">$entry</a>"; 
          }
          
        }
        
       
        
        return    $aux; 
     } 
     
     
     public static function testa($param=""){ 
        
        return "\n\t<p id=\"{$param}\" style=\"border: 1px solid red;\">sdfsdfsdf</p>";
        
     }
     
     
     public static function head(){
     	$srt_head = "";
        $head = new Head('transitional','',array('styles'),array('jquery','script'));
        $srt_head .= $head->toString();
        $srt_head .= "<body>";
   
        echo  $srt_head;
        
     }
     
     public static function param2(){
        
        $as = rand();
        
        
        return $as;
     }
     
     public static function login(){
        
        ob_start()?>
        
        <form method="post" action="">

            <input type="text" name="user" />
            <input type="text" name="pass" />
            
            <input type="submit" />
        
        
        </form>
        
        <? $retorno =  ob_get_clean();
        
        if(!empty($_POST['user'])){
           
            
            
            $sql_select = new TSqlSelect;
            $sql_select->setEntity('usuario');
            $sql_select->addColumn('usuario');
            $sql_select->addColumn('pass');
            
            
    
            $nome = str_replace("'","\'",$_POST['user']);
            
            $criteria = new TCriteria;
            
            $criteria->add(new TFilter("usuario","like","'%{$_POST['user']}%'"));
            $criteria->add(new TFilter(" pass"," = ","'".md5($_POST['pass'])."'"));
            //$criteria->add(new TFilter("valor","=","{$_POST['valor']}"));
       
            $sql_select->setCriteria($criteria);
          

            try{
            
                $conn = TConnection::open("pg_conf");
            
                $result = $conn->query($sql_select->getInstruction());
                
            
                TTransaction::setLogger(new TLoggerXML(dirname(__DIR__).'/pages/log.xml'));
                TTransaction::log("Postgres ".$sql_select->getInstruction(),0);
              
                
                $logado = false;
                
                if($result){
                    $row = $result->fetch(PDO::FETCH_OBJ);
                        
                        $_SESSION['user']= "{$row->usuario}";
                        $_SESSION['id']= "{$row->pass}";
                        
                    
                    $logado = true;
                }
                
                
                if($_SESSION['user']!=""){
                    $retorno =  "<script>alert('".$_SESSION['user']."  \nlogado com sucesso!')</script>";
                }else{
                    $retorno =   "<script>alert('falha no login!')</script>";
                }
                
                $conn = null;
            }catch(PDOException $e){
                $retorno = "Erro!".$e->getMessage()."<br />\n";
                //die();
            }
                    
                    
        }
                
                
        return $retorno;
        
     }
     
     public static function math(){  
     	
     	for($i=0;$i<100;$i++){
     		echo  pow(2, $i)."<br />";	
    	}
     
     
     
    
    
     }
    
    
    
    

    
}