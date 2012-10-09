<?

final class TSqlUpdate extends TSqlInstruction{
    
    private $columnValues;
    
    public function setRowData($column, $value){
        
        if(is_scalar($value)){
            if(is_string($value) and (!empty($value))){
                
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
    
    
    public function getInstruction(){
        
        $this->sql = "update {$this->emtity}";
        if($this->columnValues){
            foreach($this->columnValues as $column => $value){
                $set[] = "{$column} = {$value}";
            }
        }
        $this->sql .= ' SET '.implode(',',$set);
        if($this->criteria) $this->sql .= ' where '.$this->criteria->toString();
        
        return $this->sql;
    }
    
}




