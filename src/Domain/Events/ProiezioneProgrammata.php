<?php
declare(strict_types=1);

namespace DDD\Domain\Events;


use DDD\Domain\ValueTypes\Cinema;
use DDD\Domain\ValueTypes\Proiezione;

class ProiezioneProgrammata
{

    public function __construct(
        public Proiezione $proiezione,
        public \DateTimeInterface $data,
        public Cinema $cinema
    ) {
    }

}
