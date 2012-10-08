<? class Rect extends Element{
   
   
   
   public $border;
   public $background;
   public $rounded = array();
   public $width;
   public $height;
   public $css_name;   
   
   
   /**
    * @param $border
    * @param $bg
    * @param int $width 
    * @param int $height
   */
   public function Rect($name,$text="",$attr=array(),$border="",$background="",$rounded="",$width=0,$height=0){
   
        parent::Element($name,$text,$attr);
        $this->border = $border;
        $this->background = $background;
        $this->rounded = $rounded;
        $this->width = $width;
        $this->height = $height;
        
        $this->montaCss("styles");
   }
   
   public function montaCss($name){
    
        
        
        $id="";
        foreach($this->attr as $k=>$v){
            if($k=='id') $id = $v;
                    
        
              
        }
                
        ob_start();?>
              
        <?="\r#$id{"?>
            <?=empty($this->background)?"":"\r\t\t\t\tbackground:$this->background;"?>
            <?=empty($this->border)?"":"\r\t\t\t\tborder:$this->border;"?>
            <?=empty($this->rounded)?"":"\r\t\t\t\t-moz-border-radius:$this->rounded;"?>
            <?=empty($this->width)?"":"\r\t\t\t\twidth:{$this->width}px;"?>
            <?=empty($this->height)?"":"\r\t\t\t\theight:{$this->height}px;"?>            
        <?="\r}"?>
        
        <?
        $texto = ob_get_clean();
        
        
    
        file_put_contents("css/$name.css",$texto,FILE_APPEND);
        
   } 
   
   public function toString($txt=""){
      return  parent::cria_elem($txt);
   }
   
   
    
    
}