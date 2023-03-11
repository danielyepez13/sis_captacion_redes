$preguntadas = array(); // declaramos una variable que usaremos de contenedor para las preguntas ya realizadas
$array=array('pregunta1','pregunta2','pregunta3','pregunta4','pregunta5','pregunta6','pregunta7','pregunta8','pregunta9','pregunta10','pregunta11','pregunta12','pregunta13','pregunta14','pregunta15','pregunta16','pregunta17','pregunta18','pregunta19','pregunta20');
$items=count($array)-1;
 
for ($i=1; $i<=5; $i++){
    $var=rand( 0 , $items );
    if (in_array($array[$var], $preguntadas)){ // Buscamos si la pregunta ya se habia hecho
        $i--;  // restamos 1 para reutilizar el indice de la pregunta repetida  
    }else{
        echo $i.') '.$array[$var].'<br>';  // Mostramos la pregunta
        $preguntadas[].=$array[$var];  // y la agregamos a las que ya se hicieron        
    }
}
