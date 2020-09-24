<?php

namespace App\BuscadorSorteio;

class Megasena extends BuscadorSorteioBase implements BuscadorSorteioInterface
{
    private const _URL = <<<URL
http://loterias.caixa.gov.br/wps/portal/loterias/landing/megasena/!ut/p/a1/04_Sj9CPykssy0xPLMnMz0vMAfGjzOLNDH0MPAzcDbwMPI0sDBxNXAOMwrzCjA0sjIEKIoEKnN0dPUzMfQwMDEwsjAw8XZw8XMwtfQ0MPM2I02-AAzgaENIfrh-FqsQ9wNnUwNHfxcnSwBgIDUyhCvA5EawAjxsKckMjDDI9FQE-F4ca/dl5/d5/L2dBISEvZ0FBIS9nQSEh/pw/Z7_HGK818G0KO6H80AU71KG7J0072/res/id=buscaResultado/c=cacheLevelPage/=/?&concurso=';
URL;
    public function obterDezenasSorteadas(int $numeroSorteio): array
    {
        $resultado = $this->fazerRequisicaoPraSorteio($numeroSorteio);
        return explode('-', $resultado->resultadoOrdenado);
    }

    protected function getUrlParaSorteio(int $numeroSorteio): string
    {
        return self::_URL.$numeroSorteio;
    }
}
