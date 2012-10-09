<?

/**
 * 
 * 
 * 
 * 
 */
 final class TSqlSelect extends TSqlInstruction{
    
    private $columns;
    
    
    /**
     * 
     *adiciona coluna a ser retornada pelo select
     * 
     * @param str $column = coluna a ser retornada
     * 
     */
    public function addColumn($column){
        
        $this->columns[] = $column; 
    }
    
    
    /**
     * 
     *retorna instrução SQL em forma de string 
     * 
     * 
     */
    public function getInstruction(){
        
        $this->sql = "select ";
        $this->sql .= implode(",",$this->columns);
        $this->sql .= " from ".$this->entity;
        
        if($this->criteria){
            
            $expression = $this->criteria->toString();
            if($expression) $this->sql .= " where ".$expression;
        
        
            $order = $this->criteria->getProperty('order');
            $limit = $this->criteria->getProperty('limit');
            $offset = $this->criteria->getProperty('offset');
            
            $this->sql .= $order?" order by ".$this->criteria->getProperty("order"):"";
            $this->sql .= $limit?" limit ".$this->criteria->getProperty("limit"):"";
            $this->sql .= $offset?" offset ".$this->criteria->getProperty("offset"):"";
        
        }
        
        return $this->sql; 
    }
    
 } 