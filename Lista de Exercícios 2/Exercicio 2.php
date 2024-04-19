<?php
$numeros = [];
for ($i = 0; $i < 7; $i++) {
    $numeros[] = readline("Digite o número " . ($i + 1) . ": ");
}
$menor = min($numeros);
$posicao = array_search($menor, $numeros);
echo "Menor valor: $menor, Posição: $posicao";
?>