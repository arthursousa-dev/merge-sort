# Merge Sort em PHP

Implementação do algoritmo de ordenação **merge sort** em PHP puro, feita para praticar recursão e a estratégia de *dividir para conquistar*.

## Como funciona

1. **Dividir:** o vetor é partido ao meio até sobrarem vetores de 0 ou 1 elemento, que já estão ordenados.
2. **Conquistar:** cada metade é ordenada recursivamente com `mergeSort()`.
3. **Intercalar:** a função `merge()` junta duas metades ordenadas, comparando o primeiro elemento de cada uma e copiando o menor.

| Caso | Complexidade de tempo |
| --- | --- |
| Melhor | O(n log n) |
| Médio | O(n log n) |
| Pior | O(n log n) |

Usa O(n) de memória extra para os vetores auxiliares. É **estável**: elementos iguais mantêm a ordem original, graças ao `<=` na comparação.

## Rodando

```bash
php merge_sort.php
```

Saída para o vetor de exemplo `[38, 12, 27, 43, 9, 31, 18, 25]`:

```
Antes da ordenacao:
38 | 12 | 27 | 43 | 9 | 31 | 18 | 25

Depois da ordenacao:
9 | 12 | 18 | 25 | 27 | 31 | 38 | 43
```

No terminal a quebra de linha é `PHP_EOL`; aberto no navegador (XAMPP ou `php -S localhost:8000`), o script usa `<br>`.

## Testes

```bash
composer install
vendor/bin/phpunit
```

Os testes cobrem vetores vazios, repetidos, negativos, já ordenados e invertidos, e comparam o resultado com o `sort()` nativo em 50 vetores aleatórios. O GitHub Actions roda a suíte a cada push.

