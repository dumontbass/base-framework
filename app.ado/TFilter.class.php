<?php

class TFilter extends TExpression{
    
    private $variable;
    private $operator;
    private $value;
    
    
    
    /**
     *instania novo filtro 
     * @param $variable = variavel
     * @param $operator = operador ( > | <)
     * @param $value = valor a ser comparado
    */
    function __construct($variable,$operator,$value){
        
        $this->variable = $variable;
        $this->operator = $operator;
        $this->value = $value;
        
    }
    
    
    /**
     * adapta a sintaxe SQL
     * @param $value valor a ser transformado
    */
    private function transform($value){
        
        if(is_array($value)){
            foreach($value as $v){
                if((is_integer($v))) $foo[] = $v;
                elseif(is_string($v)) $foo[] = "'$v'";      
            }
                
            $result = '('.implode(',',$foo).')'; 
        }
                           
        else if(is_string($value)) $result = "'$value'";
        
        else if(is_null($value)) $result = 'NULL';
        
        else if(is_bool($value)) $result = $value?'TRUE':'FALSE';
        
        else $result = $value;
        
        return $result;
    }
    
    /**
     * 
     * retorna a string em forma de expressão SQL
     * 
    */
    public function toString(){
        
        return "{$this->variable} {$this->operator} {$this->value}";
    }
}



