<?php
declare(strict_types=1);

namespace DDD\Infrastructure;


use DDD\Domain\Aggregates\PrenotazioneProiezione;
use DDD\Domain\Aggregates\StatoPrenotazioneProiezione;
use DDD\Domain\Commands\PrenotaPosto;
use DDD\Domain\Events\Evento;

class CommandHandler
{

    /** @var Evento[] */
    protected array $storia;

    public function __construct(Evento ...$storia)
    {
        $this->storia = $storia;
    }

    /**
     * @param callable(Evento): void $publish
     */
    public function handle(object $command, callable $publish): void
    {
        if ($command instanceof PrenotaPosto) {
            $stato = new StatoPrenotazioneProiezione(...$this->storia);
            $screeningReservations = new PrenotazioneProiezione($stato);
            $screeningReservations->prenota($publish, $command->proiezione, $command->posto, $command->cliente);

            return;
        }

        throw new \InvalidArgumentException('No handler found for ' . get_class($command));
    }


}
