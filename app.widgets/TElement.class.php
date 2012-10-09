<?

class TElement{
    
    
    private $name;
    private $properties;
    private $inlines;
    protected $children;
    
    /**
     * Instancia uma tag HTML 
     * @param string $name = nome da tag
     */ 
    public function __construct($name){
        $this->name = $name;
    }
    
    
    
    
    /**
     * 
     * Adiciona um elemento filho a este elemento
     * @param Element $child
     */
    public function add(Element $child){
        $this->children[] = $child;
    }
    
    
    /**
     * 
     * Abertura de tags
     */
    private function open(){
        
        echo "<{$this->name}";
        if($this->properties){
            foreach($this->properties as $name=>$value){
                echo "{$name}=\"{$value}\"";
            }
        }
        echo ">";
    }
    
    
    /**
     * 
     * Fechamento de tags
     */
    private function close(){

    	echo !isInline()?"</{$this->name}>\n":" />";
    }
    
    /**
     * 
     * Teste de tag inline
     */
    private function isInline(){
        $inlines = array('img','a','span');
        $is = false;
        foreach($inlines as $v){
           $is = array_search($v, $inlines);
        }
        
        return $is;
    }
    
    
    
    
    public function __toString(){
        $this->open();
        $txt =  "\n";
        if($this->children){
            foreach($this->children as $child){
                if(is_object($child)) $child->show();
                else if((is_string($child)) or (is_numeric($child))) $txt .= $child;
            }
        }
        
        return $txt;
    }
    
    public function __set( $name, $value){
    	$this->$name = $value;
    }

    public function __get($name){
    	return $this->$name;
    }
    
    
    
    
    
    
    
}