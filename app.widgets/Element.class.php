<?
abstract class Element{
    
     protected $name;
     protected $text;
     protected $attr = array();
     protected $attr_str;
     
     
     /**
      *@param $name "Nome da tag"
      *@param $text "Descrição"
      *@param $attr "Atributos"
     */
     public function Element($name, $text="", $attr=array())
     {
        $this->name = $name;
        $this->text = $text;
        $this->attr = $attr;

        foreach($attr as $k=>$v){
            $this->attr_str .= "id=\"$v\"\t";
        }
            
        
     }
     
     
     /**
      * @param str text "Texto "
      * Cria elemento XHTML
     */
     public function cria_elem($text="")
     {
        
        if(!is_array($text))
        return "\n<{$this->name} {$this->attr_str}>$text".$this->fecha();
        
        else return $this->cria_Nelem($text);
        
     }
     
     
     /**
      * @param array arr "Vetor com textos"
      * @param int $iden "Identa��o"
      * Cria elemento XHTML
     */
     private function cria_Nelem($arr,$iden=0)
     {
        $i=0;
        do{
           $html .= "\r<{$this->name} {$this->attr}>$arr[$i]".$this->fecha();
           $i++;
        }while($i<sizeof($arr));
        return $html;
     }
    
    
    
    public function fecha()
    {
       $inline = "img,input";
       return (in_array($this->name,explode(',',$inline)))?"/>":"</{$this->name}>";
    }
    
    
    
    
    public function is_inline(){
    $inline = "a,br,em,img,span,select,input";
    return (in_array($this->name,explode(',',$inline)));
    
        
    }
}






?>