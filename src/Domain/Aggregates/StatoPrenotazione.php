<?php
declare(strict_types=1);

namespace DDD\Domain\Aggregates;


use DDD\Domain\Events\Evento;
use DDD\Domain\Events\PostoRiservato;
use DDD\Domain\Events\ProiezioneProgrammata;
use DDD\Domain\ValueTypes\Proiezione;
use Hoa\Event\Event;

class StatoPrenotazione
{

    private array $proiezioni = [];

    public function __construct(Evento ...$eventi)
    {

        foreach($eventi as $evento) {
            $this->apply($evento);
        }
    }

    private function apply(Evento $evento):void {

        if($evento instanceof ProiezioneProgrammata) {
            $proiezione = $evento->proiezione;
            $this->proiezioni[$proiezione->toString()] = [];
        } elseif ($evento instanceof PostoRiservato) {
            $this->proiezioni[$evento->proiezione->toString()] = $evento->posto;
        }

    }

    public function getPosti(Proiezione $proiezione): array {
        return $this->proiezioni[$proiezione->toString()];
    }

}
