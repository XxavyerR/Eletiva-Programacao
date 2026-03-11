<?php
date_default_timezone_set('America/Sao_Paulo');
$data = date("d/m/y h:i:s");
echo "<p>$data<p>";
$valor = 15005.8888;
$valor_arredondado = round($valor);
echo "<p> Valor arredondado: $valor_arredondado <p>";
$valor_formatado = number_format($valor, 2, ",", ".");
echo "<p> Valor sem formatação: $valor<p>";
echo "<p>Valor com formataçãoi: $valor_formatado<p>";
//exponenciação
$exp = pow(3,5);
//raiz quadrada
$raiz = sqrt(16);
//Numeros aleatorios
$aleatorio = rand(1,100);
//pra saber se a váriavel existe e está sendo utilizada

if(isset($nome)){
    echo "<p> Nome informado <p>";
} else {
    echo "<p> Nome não informado!<p>";
    die();
}
if (is_float($valor)){
    echo "<p> É um número flutuante! <p>";
}
?>