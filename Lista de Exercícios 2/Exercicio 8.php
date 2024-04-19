<?php
$tamanho = readline("Digite o tamanho em metros quadrados da área a ser pintada: ");
$litros_tinta = $tamanho / 3;
$latas = ceil($litros_tinta / 18);
$preco_total = $latas * 80;
echo "Quantidade de latas de tinta necessárias: $latas\n";
echo "Preço total: R$ $preco_total";
?>