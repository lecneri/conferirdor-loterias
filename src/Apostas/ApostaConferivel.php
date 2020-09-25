<?php

namespace App\Apostas;

use App\BuscadorSorteio\BuscadorSorteioInterface;

interface ApostaConferivel
{
    public function conferir(Aposta $aposta): array;
}
