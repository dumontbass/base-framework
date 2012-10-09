<?

class TLoggerXML extends TLogger{
    
    
    
    
    /**
     * (non-PHPdoc)
     * @see TLogger::write()
     */
    public function write($message,$clean){
        
        date_default_timezone_set('America/Sao_Paulo');
        $time = date("Y-m-d H:i:s");
        $text = "<log>\n";
        $text.= "  <time>$time</time>\n";
        $text.= "  <message>$message</message>\n";
        $text.= "</log>\n\r";
        
        if($clean){file_put_contents($this->filename,"");}
        
        file_put_contents($this->filename,$text,FILE_APPEND);
        
        
    }
    
    
}