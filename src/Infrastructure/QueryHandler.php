<?php
declare(strict_types=1);

namespace DDD\Infrastructure;



use DDD\Domain\Events\Evento;
use DDD\Domain\Queries\Prenotazioni;
use DDD\Domain\ReadModels\PrenotazioniCliente;
use DDD\Domain\ValueTypes\InformazioniPrenotazione;

class QueryHandler
{

    /** @var Evento[] */
    private array $storia;

    public function __construct(
        Evento ...$storia,
    ) {
        $this->storia = $storia;
    }

    /**
     * @param callable(object): void $respond
     */
    public function handle(object $query, callable $respond): void
    {
        if ($query instanceof Prenotazioni) {
            $readModel = new PrenotazioniCliente(...$this->storia);
            $respond(new InformazioniPrenotazione(...$readModel->getFor($query->cliente)));
            // Did I just forget to check if the customer actually exist?
            // Well, there would never be a query with an illegal customer, right? :D:D:D
            return;
        }

        throw new \InvalidArgumentException('No handler found for ' . get_class($query));
    }

}
