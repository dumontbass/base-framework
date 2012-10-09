<?

abstract class TSqlInstruction{
    
    protected $sql;
    protected $criteria;
    protected $entity;
    
    
    /**
     * 
     *define o nome da entidade manipulada 
     *@param str $entity = nome da tabela 
     * 
     * 
    */
    public final function setEntity($entity){
        $this->entity = $entity;
    }
    
    /**
     * 
     *retorna o nome da entidade manipulada 
     *@param str $entity = nome da tabela 
     *@return str $this->entity = nome da tabela
     * 
    */
    public final function getEntity($entity){
        return $this->entity;
    }
    
    /**
     * 
     *define  um critério de seleção dos dados por composição de objetos TCriteria 
     *@param TCriteria $criteria = objeto do tipo TCriteria
     * 
     * 
    */
    public function setCriteria(TCriteria $criteria){
        $this->criteria = $criteria;
    }
    
    abstract function getInstruction();
    
}