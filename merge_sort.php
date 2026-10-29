<?php

function mergeSort(array $vetor): array
{
    $tamanho = count($vetor);

    if ($tamanho <= 1) {
        return $vetor;
    }

    $meio = intdiv($tamanho, 2);

    $esquerda = array_slice($vetor, 0, $meio);
    $direita = array_slice($vetor, $meio);

    $esquerda = mergeSort($esquerda);
    $direita = mergeSort($direita);

    return merge($esquerda, $direita);
}

function merge(array $esquerda, array $direita): array
{
    $resultado = [];
    $i = 0;
    $j = 0;

    while ($i < count($esquerda) && $j < count($direita)) {
        if ($esquerda[$i] <= $direita[$j]) {
            $resultado[] = $esquerda[$i];
            $i++;
        } else {
            $resultado[] = $direita[$j];
            $j++;
        }
    }

    while ($i < count($esquerda)) {
        $resultado[] = $esquerda[$i];
        $i++;
    }

    while ($j < count($direita)) {
        $resultado[] = $direita[$j];
        $j++;
    }

    return $resultado;
}

$vetor = [38, 12, 27, 43, 9, 31, 18, 25];
// No terminal "<br>" apareceria literal; no navegador a quebra de linha some.
$quebra = PHP_SAPI === 'cli' ? PHP_EOL : '<br>';

echo "Antes da ordenacao:" . $quebra;
echo implode(" | ", $vetor);

$ordenado = mergeSort($vetor);

echo $quebra . $quebra;

echo "Depois da ordenacao:" . $quebra;
echo implode(" | ", $ordenado) . $quebra;
