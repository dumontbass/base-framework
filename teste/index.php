
<?include '../inc/headers/header.php'?>


<script type="text/javascript">
$(document).ready(function(){
    
   

    $('#m').live('keyup',function(){
        calcula()
        
    });
    $('#h').live('keyup',function(){
        calcula()
        
    });
    
    function calcula(){
        m = $('#m').val();
        
        h = $('#h').val()/100;
        
        m = m.replace(',','.'); 
        
        div = h*h;
        
        res = m/div;
        
        
        
        aviso = teste(res);
    $('#debug').append('<div class="aviso">'+aviso+'</div>');  
    $('#debug').append('<div class="result">'+res+'</div>');
    
    if($('.result').size()>1) $('.result:eq(0)').remove();
     if($('.aviso').size()>1) $('.aviso:eq(0)').remove();
    }
    
    function teste(res){
        var aviso ="";
        if(res >= 18.5 && res <= 24.9) aviso = "Parabéns — você está em seu peso normal";
        else if(res > 24.9 && res <= 29) aviso = "Você está acima de seu peso (sobrepeso)";
        else if(res > 29 && res <= 34.9) aviso = "Obesidade grau I";
        else if(res > 34.9 && res <= 39.9) aviso = "Obesidade grau II";
        else if(res > 39.9) aviso = "Obesidade grau III";
        else if(res < 18.5) aviso = "Você está abaixo do peso ideal";
        else aviso = "Digite um valor valido";
        
        return aviso;
    }

});

</script>
</head>
<body>
<div>

Peso: <input size="5" maxlength="3" type="text"  id="m" />Kg
Altura: <input size="5" maxlength="3" type="text"  id="h" />cm

<input type="button" id="submit" value="Calcular" />




</div>

<div id="debug">

</div>

</body>
</html>

