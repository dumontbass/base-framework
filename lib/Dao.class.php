<?

class Dao{
    
    private $host;
    private $user;
    private $senha;
    private $db;
    private $conn;
    
    
    
    /**
     * @param str $db
     *Data Access Object 
     * 
     * 
     * 
    */
    public function __construct($db,$user,$senha,$host)
    {
        $this->host = $host;
        $this->user = $user;
        $this->senha = $senha;
        $this->db = $db;
    }
    
    public function conecta(){
        
        //$pgsql = new PDO('pgsql:host=db.example.com', $user, $password);

        $this->conn = new PDO("pgsql:host={$this->host}",$this->user,$this->senha);
    }
    
    public function sql($sql,$ins = ''){
        
        try{
            $this->conecta();
            $aux = $this->conn->query($sql,PDO::FETCH_ASSOC);
            if(!empty($aux))return $aux;
            $this->conn = null;
        }catch(PDOException $e){
            print "Erro!: ". $e->getMessage();
            die();
        }
        
    }
    
    
}


?>