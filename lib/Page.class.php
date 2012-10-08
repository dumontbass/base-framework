<?

class Page{
    
    public $name;
    public $header;
    public $content;
    public $columns = array();
    public $footer;
    
    
    /**
     *@param Header $h 'header'
     *@param str $content 'conteudo' 
     *@param str $columns
     *@param str $footer
     *@param str $name 'nome da pagina html' 
    */
    public function Page(Head $h,$ct,$c,$f,$n){
        $this->header = $h;
        $this->content = $ct;
        $this->columns = $c;
        $this->footer = $f;
        $this->name = $n;
        
        
        
    }
    
    
    /**
     * 
     * @return  file_get_contents("pages/página")               
    */
    public function carregaPage(){
         return utf8_encode(file_get_contents("pages/{$this->name}"));
    }
    
    
    
    /**
     * @param str $nome 'Nome da página'
     * @param str $string 'Conteúdo para inserir'
     * @param Element $elem 'Um objeto Element'
     * @link 
     * 
    */
    public function escrevePage($nome, $string, Element $elem = null){
        $this->content = file_put_contents("pages/{$this->name}",$string);
    }        
    
    
            
    
    /**
     * @param str $child 'acrescenta um nó'
     * @save boolean $save 'salva no arquivo'
     *          
    */
    public function addChild($child, $save = false){
        $this->content.=$child;
        if($save)  file_put_contents("pages/{$this->name}",$this->content);
        $this->toString();
    }
    
    
    
    // toString        
    public function toString($add=""){
        echo  "\n".$this->header->toString()."  
                \r\n$this->content
                \r\n".$this->carregaPage()."
                \r\n$this->columns
                \r\n$add
                \n$this->footer
        
        ";
    }            
    
    
    
}