<?
/**
 * 
 * gerencia conexões com bancos de dados por arquivos de configuração
 * 
 * 
 */ 
final class TConnection{
    
    
    /**
     * não pode ser instanciado
     */ 
    private function __construct(){}
    
    
    /**
     * 
     * Instancia o objeto PDO do banco informado
     * @param string $name
     */
    public static function open($name){
        
        if(file_exists("app.config/{$name}.ini"))
            $db = parse_ini_file("app.config/{$name}.ini");
            
        else throw new Exception("Arquivo '$name' não encontrado");
        
        $user = isset($db['user']) ? $db['user']:null;
        $pass = isset($db['pass']) ? $db['pass']:null;
        $name = isset($db['name']) ? $db['name']:null;
        $host = isset($db['host']) ? $db['host']:null;
        $type = isset($db['type']) ? $db['type']:null;
        $port = isset($db['port']) ? $db['port']:null;
        
        switch($type){
            
            case 'pgsql':
                $port = $port ? $port : '5432';
                $conn = new PDO("pgsql:dbname={$name}; 
                                 user={$user}; 
                                 password={$pass};
                                 host={$host};
                                 port={$port}");
            break;
            
            case 'mysql':
                $port = $port ? $port : '3306';
                $conn = new PDO("mysql:host={$host}; 
                                 port={$port}; 
                                 dbname={$name}",
                                 $user,
                                 $pass);
            break;
            
            case 'sqlite': $conn = new PDO("sqlite:{$name}"); break;
                
            case 'mssql':
                
                $conn = new PDO("mssql:host={$host},1433;dbname={$name}",$user,$pass);
            break;
        }
        
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        return $conn;
    }
    
    
    
}