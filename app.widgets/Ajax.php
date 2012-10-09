<?
/**
 * 
 *
 */  
class Ajax{
    
    private $file;
    private $url;
    private $id;
    private $params = array();
    
    
    /**
     *@param string $file = arquivo js
     *@param string $url = url da acao do ajax
     *@param string $id = id do elemento html 
     *@param mixed $params[] = vetor com os parametros
     */ 
    public function __construct($file,$url,$id,$params){
        
        
        $this->file = $file;
        $this->url = $url;
        $this->id = $id;
        
    }
    
    public function addParam($param){
        $this->params[] = $param;
    }
    
    
    public function printCode(){
        
        
        $params = implode(",",$this->params);
        
        
        
        $code = "
             $(document).ready(function(){
                
                $.post('acao_pesquisa.php',{nome: nome },
                function(resposta){ 
                
                    $('html').append('<div id=\"resposta_nome\"></div>');
                    $('#resposta_nome').html(resposta)
                   
                 }
             );
                
             });
        
        ";
        
        if(!file_exists("js/$file.js"));
        file_put_contents("js/$file.js", $this->code);
    }
    
    
    
    public function __get(string $name){
        return $this->$name;
    }
    
    public function  __set(string $name ,$value){
        $this->$name = $value;
    }
    
    public function __toString(){
        
        return "
        <script type=\"text/javascript\" src=\"js/$file.js\"></script>
    
         ";
    }
    
    
}