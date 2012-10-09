<?

abstract class TLogger{
    
    protected $filename;
    
    
    
    /**
     * 
     * @param str $filename = nome do arquivo de log
     * 
     * 
     */
    public function __construct($filename){
        
        $this->filename = $filename;
        //  file_put_contents($filename,'erter');
    }
    
    
    
    
    /**
     * 
     * Escreve mensagem de log em arquivo
     * @param string $message
     * @param boolean $clean
     */
    abstract public function write($message,$clean);
    
    
}