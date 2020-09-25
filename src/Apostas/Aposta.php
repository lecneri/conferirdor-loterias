<?php

namespace App\Apostas;

class Aposta
{
    private array $dezenas;
    private int $sorteio;
    private array $acertos = [];

    public function __construct(array $dezenas, int $sorteio)
    {
        $this->dezenas = $dezenas;
        $this->sorteio = $sorteio;
    }

    /**
     * Get the value of sorteio
     */
    public function getSorteio(): int
    {
        return $this->sorteio;
    }

    /**
     * Get the value of acertos
     */
    public function getAcertos(): array
    {
        return $this->acertos;
    }

    public function getQuantidadeAcertos(): int
    {
        return count($this->acertos);
    }

    /**
     * Set the value of acertos
     *
     * @return  self
     */
    public function setAcertos(array $acertos): self
    {
        $this->acertos = $acertos;

        return $this;
    }

    public function addAcerto(int $dezena): self
    {
        if (!in_array($dezena, $this->acertos)) {
            array_push($this->acertos, $dezena);
        }

        return $this;
    }

    /**
     * Get the value of dezenas
     */
    public function getDezenas(): array
    {
        return $this->dezenas;
    }
}
