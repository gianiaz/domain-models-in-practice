<?php

declare(strict_types=1);

namespace DDD\Domain\Events;

use DDD\Domain\ValueTypes\Cliente;
use DDD\Domain\ValueTypes\Posto;
use DDD\Domain\ValueTypes\Proiezione;

class PostoRiservato implements Evento
{
    public function __construct(
        public Proiezione $proiezione,
        public Posto $posto,
        public Cliente $cliente
    ) {
    }
}
