<?
 /**
  * 
  * deleta 
  * 
  * 
*/
final class TSqlDelete extends TSqlInstruction{
    
    public function getInstruction(){
        
        $this->sql = "delete from {$this->entity}";
        
        if($this->criteria){
            
            $expression = $this->criteria->toString();
            if($expression) $this->sql .= " where ".$expression;
                
            
        }
        
        return $this->sql;
    }
    
} 