<?php

namespace App\BuscadorSorteio;

use GuzzleHttp\Client;

use function GuzzleHttp\json_decode;

abstract class BuscadorSorteioBase
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    abstract protected function getUrlParaSorteio(int $numeroSorteio): string;

    abstract public function obterDezenasSorteadas(int $numeroSorteio): array;

    public function fazerRequisicaoPraSorteio(int $numeroSorteio)
    {
        $response = $this->client->get($this->getUrlParaSorteio($numeroSorteio));
        $body = $response->getBody()->getContents();
        return json_decode($body);
    }


    public function obterDezenasSorteadasInt(int $numeroSorteio): array
    {
        return array_map(fn ($i) => intval($i), $this->obterDezenasSorteadas($numeroSorteio));
    }
}
