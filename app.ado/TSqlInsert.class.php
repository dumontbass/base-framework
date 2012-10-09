<?

final class TSqlInsert extends TSqlInstruction{
    
    private $columnValues;
    
    public function setRowData($column, $value){
        if(is_scalar($value)){
            if(is_string($value)){
                
                $value = addslashes($value);
                $this->columnValues[$column] = "'$value'";
            }elseif(is_bool($value)){
                $this->columnValues[$column] = $value? 'TRUE':'FALSE';
            }elseif($value!==''){
                $this->columnValues[$column] = $value;
            }else{
                $this->columnValues[$value] = 'NULL';
            }
        }
        
    }
    
    public function setCriteria($criteria){
        
        throw new Exception("Cannot load this from ".__CLASS__);
        
    }
    
    public function getInstruction(){
        
        $this->sql = "insert into {$this->entity} (";
        $columns = implode(',',array_keys($this->columnValues));
        $values = implode(',',array_values($this->columnValues));
        $this->sql .= $columns . ')';
        $this->sql .= "values ({$values})";
        
        return $this->sql;
    }
    
    
}