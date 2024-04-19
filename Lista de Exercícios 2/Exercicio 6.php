<?php
$a = readline("Digite o valor de A: ");
$b = readline("Digite o valor de B: ");

if ($a == $b) {
    echo "Números iguais: $a";
} elseif ($a < $b) {
    echo "$a $b";
} else {
    echo "$b $a";
}
?>