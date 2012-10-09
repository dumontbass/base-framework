<?


class TImage extends TElement{
    
    private $source;
   
    
    
    public function __construct(string $source){
        parent::construct('img');
        $this->src = $source;
    }
    
    
}