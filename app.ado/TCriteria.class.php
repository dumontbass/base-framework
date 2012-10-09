<?

class TCriteria extends TExpression{
    
    private $expressions;
    private $operators;
    private $properties;
    
    
    function __construct(){
        $this->expressions = array();
        $this->operators = array();
        
    }
    
    
    /**
     *@param TExpression $expression = expressao  obj
     *@param $operator  = operador logico
     * 
    */
    public function add(TExpression $expression, $operador = parent::AND_OPERATOR){
        
        if(empty($this->expressions)) $operador = NULL;
        
        $this->expressions[] = $expression;
        $this->operators[] = $operador;
    }
    
    
    
    public function toString(){
        
        if(is_array($this->expressions)){
            if(count($this->expressions)>0){
                $result = '';
                foreach($this->expressions as $i=> $expression){
                    $operator = $this->operators[$i];
                    $result .= $operator.$expression->toString().' ';
                }
                $result = trim($result);
                return "({$result})";
            }
        }    
    }
    
    
    /**
     * 
     * 
     * 
    */
    public function setProperty($property,$value){
        
        if(isset($value)){
            $this->properties[$property] = $value;
        }else{
            $this->properties[$property] = NULL;
        }
    }
    
    
     /**
     * 
     * 
     * 
    */
    public function getProperty($property){
        
        if(isset($this->properties[$property])){
            return $this->properties[$property];
        }
    }
    
}