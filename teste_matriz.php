<?

$matriz = cria_matriz();

$matriz2 = cria_matriz();


//flipDiagonally($matriz);
matriz_to_tabela($matriz);

matriz_to_tabela(vetor_soma_matriz($matriz));

matriz_to_tabela(flipDiagonally($matriz2));

matriz_to_tabela(vetor_soma_matriz($matriz2));



function cria_matriz(){
	$matriz[][] = array();
	
	for($cols=0;$cols<20;$cols++){

		for($rows=0;$rows<20;$rows++){
			if($cols==0)$matriz['titulo'][$rows]= $rows;
			//if($cols==9)$matriz['total'][$cols]+= $matriz[$rols];
			$matriz[$rows][$cols] = (int)$rows;
		}
		
	}
	return $matriz;
	
}

function matriz_to_tabela($matriz){
	
	echo "<table style=\"border: 1px dotted #777;float: left; margin-left: 20px;\">";
	foreach($matriz as $k=>$v){
		echo "<tr>";
		if(!is_array($v)) echo "<td style=\"border: 1px dotted #777;$color\">$v</td>";
		else{
			foreach($v as $x=>$y){
				$color = $k==$x?"color:red;":"color:green";
				echo "<td style=\"border: 1px dotted #777;$color\">$y</td>";
			}
		}
		
		echo "</tr>";
	}
	echo "<table>";
}

function inverte_matriz($matriz){
	foreach($matriz as $k=>$v){

		foreach($v as $x=>$y){

			$matriz[$i][$j] = $matriz[$j][$i];
				
		}

	}
	return $matriz;
}

function flipDiagonally($arr) {
    $out = array();
    foreach ($arr as $key => $subarr) 
        foreach ($subarr as $subkey => $subvalue) 
               $out[$subkey][$key] = $subvalue;
        
    
    return $out;
}

function vetor_soma_matriz($matriz){
	$soma = array();
	
	foreach($matriz as $k=>$v)
			
		$soma[] = array_sum($v);

	
	return $soma;
}

//  compara matrizes

function compara_matrizes($matrizes){
	
	$retorno = array();
	
	
}

function percorre_matriz(){
	
}
