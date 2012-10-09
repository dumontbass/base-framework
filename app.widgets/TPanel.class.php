<?

class TPanel extends Element{
    
    private $width;
    private $height;
    private $bg;
    private $id;
    
    public function __construct($width, $height, $bg, $id){
        $this->width = $width;
        $this->height = $height;
        $this->bg = $bg;
        $this->id = $id;
    }
    
    
    
    
    public function __toString(){
        
        
        echo  "
        <div {$this->attr_str}>
            
        </div>
        ";
    }
    
    public function isDraggable(){
        
        $this->attr[] = " class=\"draggable\" ";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}