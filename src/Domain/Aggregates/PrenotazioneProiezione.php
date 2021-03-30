<?php

declare(strict_types=1);

namespace DDD\Domain\Aggregates;

use DDD\Domain\Events\Evento;
use DDD\Domain\Events\PostoNonRiservato;
use DDD\Domain\Events\PostoRiservato;
use DDD\Domain\ValueTypes\Cliente;
use DDD\Domain\ValueTypes\Posto;
use DDD\Domain\ValueTypes\Proiezione;

class PrenotazioneProiezione
{
    public function __construct(
        private StatoPrenotazioneProiezione $statoPrenotazione
    ) {
    }

    /**
     * @param callable(Evento):void $publish
     */
    public function prenota(callable $publish, Proiezione $proiezione, Posto $posto, Cliente $cliente): void
    {
        if ($this->postoGiaRiservato($proiezione, $posto)) {
            $publish(new PostoNonRiservato($proiezione, $posto));
        } else {
            $publish(new PostoRiservato($proiezione, $posto, $cliente));
        }
    }

    private function postoGiaRiservato(Proiezione $proiezione, Posto $posto): bool
    {
        foreach ($this->statoPrenotazione->getPosti($proiezione) as $seat) {
            if ($seat->equals($posto)) {
                return true;
            }
        }

        return false;
    }
}
