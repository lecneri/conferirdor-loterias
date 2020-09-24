<?php

namespace App\BuscadorSorteio;

use GuzzleHttp\Client;

class Lotofacil extends BuscadorSorteioBase implements BuscadorSorteioInterface
{
    private const _URL = 'http://loterias.caixa.gov.br/wps/portal/loterias/landing/lotofacil/!ut/p/a1/04_Sj9CPykssy0xPLMnMz0vMAfGjzOLNDH0MPAzcDbz8vTxNDRy9_Y2NQ13CDA0sTIEKIoEKnN0dPUzMfQwMDEwsjAw8XZw8XMwtfQ0MPM2I02-AAzgaENIfrh-FqsQ9wBmoxN_FydLAGAgNTKEK8DkRrACPGwpyQyMMMj0VAcySpRM!/dl5/d5/L2dBISEvZ0FBIS9nQSEh/pw/Z7_61L0H0G0J0VSC0AC4GLFAD2003/res/id=buscaResultado/c=cacheLevelPage/=/?concurso=';

    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    public function obterDezenasSorteadas(int $numeroSorteio): array
    {
        $dadosSorteio = $this->fazerRequisicaoPraSorteio($numeroSorteio);
        return explode('-', $dadosSorteio->resultadoOrdenado);
    }

    protected function getUrlParaSorteio(int $numeroSorteio): string
    {
        return self::_URL.$numeroSorteio;
    }
}
