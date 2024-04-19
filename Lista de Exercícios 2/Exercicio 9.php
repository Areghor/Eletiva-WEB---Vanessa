<?php
$ano_nascimento = readline("Digite o ano de nascimento: ");
$ano_atual = date("Y");
$idade = $ano_atual - $ano_nascimento;
$dias_vividos = $idade * 365;
$idade_2025 = 2025 - $ano_nascimento;
echo "Idade: $idade anos\n";
echo "Dias vividos: $dias_vividos dias\n";
echo "Idade em 2025: $idade_2025 anos";
?>