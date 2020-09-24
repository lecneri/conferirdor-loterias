<?php

namespace App\BuscadorSorteio;

interface BuscadorSorteioInterface
{
    public function obterDezenasSorteadas(int $numeroSorteio): array;
}
