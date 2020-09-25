<?php

namespace ConferidorSorteio;

use App\Apostas\Aposta;
use App\Apostas\ApostaConferivel;
use App\BuscadorSorteio\BuscadorSorteioInterface;

class ConferidorSorteio implements ApostaConferivel
{
    protected BuscadorSorteioInterface $buscadorSorteio;

    public function __construct(BuscadorSorteioInterface $buscadorSorteio)
    {
        $this->buscadorSorteio = $buscadorSorteio;
    }

    public function conferir(Aposta $aposta): array
    {
        $sorteio = $aposta->getSorteio();
        $dezenasSorteadas = $this->buscadorSorteio->obterDezenasSorteadasInt($sorteio);
        $dezenasApostadas = $aposta->getDezenas();
        $aposta->setAcertos(array_intersect($dezenasSorteadas, $dezenasApostadas));
        return $aposta->getAcertos();
    }


    public function conferirJogos(array $jogos)
    {
        $acertos = [];
        foreach ($jogos as $id => $jogo) {
            $acertos[$id] = $this->conferir($jogo);
        }
        return $acertos;
    }

    /**
     * Get the value of buscadorSorteio
     */
    public function getBuscadorSorteio(): BuscadorSorteioInterface
    {
        return $this->buscadorSorteio;
    }

    /**
     * Set the value of buscadorSorteio
     *
     * @return  self
     */
    public function setBuscadorSorteio(BuscadorSorteioInterface $buscadorSorteio): self
    {
        $this->buscadorSorteio = $buscadorSorteio;

        return $this;
    }
}
