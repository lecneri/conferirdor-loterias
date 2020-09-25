<?php

namespace App\BuscadorSorteio;

interface BuscadorSorteioInterface
{
    public function obterDezenasSorteadas(int $numeroSorteio): array;
    public function obterDezenasSorteadasInt(int $numeroSorteio): array;
}
