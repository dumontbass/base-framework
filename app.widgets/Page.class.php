<?

class Page{
    
    public $name;  // Nome da pagina ( Nome do arquivo .page.html)
    public $head;  // Meta tags adicionais
    public $content; // Conteúdo da página
    public $columns; // Número de colunas *
    public $tags;   // Bibliotecas de Custom Tags
    
    
    
    /**
     *@param str $name 'nome da pagina html'    
     *@param Header $h 'header'
     *@param str $master 'master page' 
     *@param str[] $columns
     *@param str $footer
     *
     */
    public function __construct($n ,Head $head = null, $ct="", $c= null){
        
        $this->name = $n;
        $this->head = $head;
        $this->content = $ct;
        $this->columns = $c;
        $this->tags = array();
        
       
    }
    
    
    /**
     * 
     * Adiciona biblioteca de tags
     * @param string $tag
     * @param string $name
     */
    public function addTag($tag, $name){
        $this->tags[$tag] = $name;
       
    }
    
    
    /**Ex:
     * <base:classe param1="param" />
     * <base:_lib_  param="param" />
     * 
     * @return  file_get_contents("pages/página")               
    */
    public function carregaPage(){
         
        $file = trim(utf8_encode(file_get_contents("pages/{$this->name}.page.html")));
       
        foreach($this->tags as $k=>$v){
        	
        	 $k::customTags(&$file,$k, $v);
        }
        
        return $file;
        
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
        if($save)  file_put_contents("pages/{$this->name}.page",$this->content);
        $this->toString();
    }
    
    
    
    
    
    
    // toString        
    public function __toString(){
          
        $this->content =  "\n".$xxx=$this->head?$this->head->toString():"";
        $this->content .= $this->carregaPage();        
        $this->content.=   	"
                \r\n$this->columns 
		        </body>
		</html>
		";
        
        return $this->content;
      
    }            
    
    
    
}