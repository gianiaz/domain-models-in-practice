<?php
declare(strict_types=1);

namespace DDD\Domain\Queries;


use DDD\Domain\ValueTypes\Cliente;

class Prenotazioni
{

    public function __construct(
        public Cliente $cliente
    ) {

    }

}
