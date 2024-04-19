<?php
$valor1 = readline("Digite o primeiro valor: ");
$valor2 = readline("Digite o segundo valor: ");
$soma = $valor1 + $valor2;
if ($valor1 == $valor2) {
    $soma *= 3;
}
echo "A soma é: $soma";
?>