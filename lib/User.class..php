<?
class User{
    
    private $nome;
    private $login;
    private $senha;
    
    
    private function md5_senha($senha)
    {
       return md5($senha); 
    }
    
}






?>