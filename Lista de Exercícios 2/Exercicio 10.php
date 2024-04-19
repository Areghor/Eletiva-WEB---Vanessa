<?php
$peso = readline("Digite seu peso em kg: ");
$altura = readline("Digite sua altura em metros: ");

$imc = $peso / ($altura * $altura);
echo "Seu IMC é: $imc\n";

if ($imc < 18.5) {
    echo "Você está abaixo do peso.";
} elseif ($imc >= 18.5 && $imc < 24.9) {
    echo "Você está com o peso normal.";
} elseif ($imc >= 24.9 && $imc < 29.9) {
    echo "Você está com sobrepeso.";
} else {
    echo "Você está obeso.";
}
?>