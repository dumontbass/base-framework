<?
class Css{
    
    private $files;
    private $folder;
    private $custom;
    
    public function Css($files, $folder, $custom="")
    {
        $this->files = $files;
        $this->folder = $folder;
        $this->custom = $custom;
    }
    
    
    /**
     *@param $k "Chave do vetor dos arquivos" 
     *@protected
     *@tutorial   
     * 
     */
    protected function import($k)
    {
        return "@import $file[$k]";
    }    
    
    
    
    
}

?>