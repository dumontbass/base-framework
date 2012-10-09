
<?
     xdebug_var_dump($_POST);


?>

<h1 style="margin-top: 60px ;">Math</h1>
<div>
    <p>sdfdsfsaaaaaa</p>

</div>



<script type="text/javascript">


a = new Object();
a.nums = new Array;


a.soma_x = function() {
    soma=0
	for(x in this.nums){
	   soma+=this.nums[x]
	}
    return soma
}

a.add_x = function(x){
     prompt("Digite o x:","")
}


a.add()
alert(a.soma_x())

vet = new Array()

vet[0] = 'fdsfsd'
vet[1]  = 'kljdlkjlkdj'

for(x in vet){
    alert(x+vet[x])
}

$(document).ready(function(){
   
   $('p').css('color','red');
   
    
});



//document.write('escreveu');






</script>

<?for($i=0;$i<1000000;$i++){

    echo $i;
    
}?>

