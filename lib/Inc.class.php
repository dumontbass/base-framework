<?

class Inc{
    
    public $includes;
    
   
    /**
     *@param str $pasta 'pasta para buscar os includes'
     *@param str $path 'caminho '  
     * 
    */
    public static function getInc($fonte,$dest){
        
        
        $dir = scandir("$fonte"); 
        shuffle($dir);
        $aux = "<?";
        $temp = ""; 
    	foreach($dir as $k=>$v) {
    	   echo $v."\r";
           
           if($temp>$dir[$k+1])
    	       $aux .= ($v!="." && $v!=".." && !preg_match('/^~/',$v) && !preg_match('/^base_debug/',$v))?"include_once '$fonte$v';\r\n":"";
    	   else{
                $aux .= ($dir[$k+1]!="." && $dir[$k+1]!=".." && !preg_match('/^~/',$dir[$k+1]) && !preg_match('/^base_debug/',$dir[$k+1]))?"include_once '$fonte".$dir[$k+1]."';\r\n":"";
    	        $temp = $v;   
           }
        }
    	     
       
        
        file_put_contents($dest,$aux);

        include_once $dest;
       
        
    }
   
    
}


