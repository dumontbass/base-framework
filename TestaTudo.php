<?


$str = ereg('[abcde]',
    "http://www.php.net/index.html",$matches);
    
    $asd = ereg_replace('</?[pac]+a>','_','<pa>anão</p> <aa>erjadsjd</a><h1></h1>');
    
xdebug_var_dump($matches);

xdebug_var_dump($asd);
