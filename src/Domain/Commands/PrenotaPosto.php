<?php
declare(strict_types=1);

namespace DDD\Domain\Commands;


use DDD\Domain\ValueTypes\Cliente;
use DDD\Domain\ValueTypes\Posto;
use DDD\Domain\ValueTypes\Proiezione;

class PrenotaPosto
{

    public function __construct(
        public Proiezione $proiezione,
        public Posto $posto,
        public Cliente $cliente,
    ) {

    }

}
