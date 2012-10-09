<?
class Ajax{


    private $request;
    private $params;
    private $marker;
    
    /**
     * @param 
     * @param
     */ 
    public function __construct($request, $params){
        
        $this->request = $request;
        $this->params = $params;
        $this->printJs();
    }
    
    
    public function addParam($param){
        $this->params[] = $param;
    }
    

    public function printJs(){
        
        $js = "
            $.post('{$this->request}', {";
            
           
            if(is_array($this->params)){
                $i=0;
                foreach($this->params as $k=>$v){
                    $js.=$i>0?",":"";
                   
                    $js.= "$k : $v";
                    
                    $i++;
                }
           
            } else
                $js.= $this->params;
                
            
             
         $js .= "    },
             function(data){
               alert('dfdsfs');
             });
        
        ";
        
        $arquivo = file_get_contents("js/script.js");
        
        if($marker){
            $body = "$(document).ready(function(){";
            
            $aux = str_replace("//ends","$js",$arquivo);
                
            file_put_contents('js/script.js',"$aux\n//ends");
            
            
            preg_match('/-->/',$arquivo, $matches);
            
            echo $matches[0];
          
        }
        
        
        
        
        
        //return $js;
    }
    







    
    
}
    
    