<?php

use PHPUnit\Framework\TestCase;

final class MergeSortTest extends TestCase
{
    public function test_vetores_triviais_voltam_iguais(): void
    {
        $this->assertSame([], mergeSort([]));
        $this->assertSame([7], mergeSort([7]));
    }

    public function test_ordena_o_exemplo_do_readme(): void
    {
        $this->assertSame([9, 12, 18, 25, 27, 31, 38, 43], mergeSort([38, 12, 27, 43, 9, 31, 18, 25]));
    }

    public function test_lida_com_repetidos_negativos_e_ja_ordenados(): void
    {
        $this->assertSame([-5, -1, 0, 3, 3, 3], mergeSort([3, -1, 3, 0, -5, 3]));
        $this->assertSame([1, 2, 3, 4], mergeSort([1, 2, 3, 4]));
        $this->assertSame([1, 2, 3, 4], mergeSort([4, 3, 2, 1]));
    }

    public function test_bate_com_sort_nativo_em_vetores_aleatorios(): void
    {
        mt_srand(42);
        for ($i = 0; $i < 50; $i++) {
            $vetor = array_map(fn() => mt_rand(-1000, 1000), range(1, mt_rand(0, 200)));
            $esperado = $vetor;
            sort($esperado);
            $this->assertSame($esperado, mergeSort($vetor));
        }
    }

    public function test_merge_intercala_duas_metades_ordenadas(): void
    {
        $this->assertSame([1, 2, 3, 4, 5, 6], merge([1, 4, 6], [2, 3, 5]));
        $this->assertSame([1, 2], merge([], [1, 2]));
    }
}
