<?php
namespace App;

require_once __DIR__.'/../vendor/autoload.php';

use App\Apostas\Aposta;
use App\BuscadorSorteio\Lotofacil;
use App\BuscadorSorteio\Megasena;
use GuzzleHttp\Client;

$client = new Client([
    'allow_redirects' => [
        'max' => 3,
    ],
    'cookies' => true,
]);

$lotofacil = new Lotofacil($client);

$numerosSorteados = $lotofacil->obterDezenasSorteadasInt(2040);

$jogos = [
    new Aposta([1,3,4,5,6,7,9,10,11,15,17,18,19,22,23,24,25], 2040),
    new Aposta([1,2,4,5,6,9,11,13,14,15,16,17,18,20,22,23,25], 2040),
    new Aposta([1,2,3,5,6,9,10,11,13,14,16,17,18,20,22,23,25], 2040),
    new Aposta([1,2,3,4,6,7,9,11,13,14,17,18,19,20,21,22,23], 2040),
    new Aposta([2,3,4,6,9,10,13,14,15,17,18,19,20,21,22,23,25], 2040),
    new Aposta([2,4,5,6,8,10,12,13,14,15,17,18,20,21,22,23,25], 2040),
    new Aposta([1,2,3,4,6,7,9,10,11,14,15,17,18,19,23,24,25], 2040),
    new Aposta([2,4,5,6,7,9,11,12,14,17,20,21,22,23,24,25], 2040),
];

$jogos = [
[1,3,4,5,6,7,9,10,11,15,17,18,19,22,23,24,25],
[1,2,4,5,6,9,11,13,14,15,16,17,18,20,22,23,25],
[1,2,3,5,6,9,10,11,13,14,16,17,18,20,22,23,25],
[1,2,3,4,6,7,9,11,13,14,17,18,19,20,21,22,23],
[2,3,4,6,9,10,13,14,15,17,18,19,20,21,22,23,25],
[2,4,5,6,8,10,12,13,14,15,17,18,20,21,22,23,25],
[1,2,3,4,6,7,9,10,11,14,15,17,18,19,23,24,25],
[2,4,5,6,7,9,11,12,14,17,20,21,22,23,24,25],
];


foreach ($jogos as $numJogo => $jogo) {
    dump("Jogo $numJogo: " . implode(' - ', $jogo));
    dump('Dezenas sorteadas ' . implode(' - ', $numerosSorteados));
    dump("Acertos", implode(' - ', array_intersect($numerosSorteados, $jogo)));
    dump("Total", count(array_intersect($numerosSorteados, $jogo)));
    dump('---------');
}

// var_dump(array_diff($numerosSorteados, $numerosEscolhidos));
// var_dump(count($numerosSorteados) - count(array_diff($numerosSorteados, $numerosEscolhidos)));
