<?php

namespace ConferidorSorteio;

use GuzzleHttp\Client;

class ConferidorSorteio
{
    protected $client;

    public function __construct(Client $client)
    {
        
        $this->client = $client;
    }

    public function conferirJogo(int $sorteio, array $jogo, string $classJogo)
    {
        //TODO implemente-me
    }

    public function conferirJogos(int $sorteio, array $jogos, string $classJogo)
    {
        foreach ($jogos as $jogo) {
            $this->conferirSorteio($sorteio, $jogo);
        }
    }
}
