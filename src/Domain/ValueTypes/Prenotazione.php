<?php

declare(strict_types=1);

namespace DDD\Domain\ValueTypes;

class Prenotazione
{
    public function __construct(public Proiezione $proiezione, public Posto $posto)
    {
    }
}
