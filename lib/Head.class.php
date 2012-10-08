<?

class Head{
    
    public $doctype;
    public $head = array();
    public $css = array();
    public $js = array();
    public $title;
    
   
    
      
    
    /**
     *@param str $d doctype 
     *@param str $h head
     * @param array $css css
    */
    public function Head($d,$h,$css,$js,$title="Base page"){
        
        $this->doctype = $d;
        $this->head = $h;
        $this->css = $css;
         $this->js = $js;
        $this->title = $title;        
    }
    
    public  function toString(){
     
       if($this->doctype=='transitional'){
           
            echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
            "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR">
            <head>
            <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
            '.$this->head.'
            <title>'.$this->title.'</title>';            
            foreach($this->css as $k=>$v){
                echo '
            <link rel="stylesheet" href="css/'.$v.'.css" type="text/css" />';
            }
            foreach($this->js as $k=>$v){
                
                if($_SESSION[aux]!=1){
                   // $js = $v=="jquery"?@file_get_contents("http://code.jquery.com/jquery-1.4.4.min.js"):"";
                   // file_put_contents ("js/$v.js","$js");
                    
                    $_SESSION[aux] = 1;
                }
                
                echo '
            <script type="text/javascript" src="js/'.$v.'.js"></script>';
            }
        echo "\n\r</head>";
        
        
        }elseif($this->doctype=='strict'){
            echo '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html>
        <head>
            '.$this->head.'
                        
        </head>
        ';
        }
                    
    }
    
    
    
    
    
    
}






?>