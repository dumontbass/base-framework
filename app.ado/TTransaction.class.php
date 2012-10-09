<?

final class TTransaction{
    
    private static $conn;
    private static $logger;
    
    private function __construct(){}
    
    /**
     * 
     * Abre a conexão com o banco de dados
     * @param unknown_type $database
     */
    private static function open($database){
        
        if(empty(self::$conn)){
            self::$conn = TConnection::open($database);
            self::$conn->beginTransaction();
            self::$logger = null;
        }
        
    }
    
    public static function get(){
        return self::$conn;
    }
    
    public static function roolback(){
        if(self::$conn){
            self::$conn->rollBack();
            self::$conn = null;
        }
    }
    
    /**
     * 
     * Fecha a conexão
     */
    public static function close(){
        
        if(self::$conn){
            self::$conn->commit();
            self::$conn = null;
        }
    }
    
    public static function setLogger(TLogger $logger){
        
        self::$logger = $logger;
    }
    
    public static function log($message,$clean){
        
        if(self::$logger){
            self::$logger->write($message,$clean);
        }
    }
}