<?php

declare(strict_types=1);

namespace DDD\Domain\ReadModels;

use DDD\Domain\Events\Evento;
use DDD\Domain\Events\PostoRiservato;
use DDD\Domain\ValueTypes\Cliente;
use DDD\Domain\ValueTypes\Prenotazione;

class PrenotazioniCliente
{
    /**
     * @var array<string,Prenotazione[]>
     */
    private array $prenotazioni = [];

    public function __construct(Evento ...$eventi)
    {
        foreach ($eventi as $evento) {
            $this->apply($evento);
        }
    }

    private function apply(Evento $evento): void
    {
        if (! $evento instanceof PostoRiservato) {
            return;
        }

        $this->prenotazioni[$evento->cliente->toString()] ??= [];
        $this->prenotazioni[$evento->cliente->toString()][] = new Prenotazione($evento->proiezione, $evento->posto);
    }

    /**
     * @return Prenotazione[]
     */
    public function getFor(Cliente $cliente): array
    {
        return $this->prenotazioni[$cliente->toString()];
    }
}
