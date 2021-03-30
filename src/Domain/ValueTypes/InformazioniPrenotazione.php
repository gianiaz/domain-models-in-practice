<?php
declare(strict_types=1);

namespace DDD\Domain\ValueTypes;


use DDD\Domain\Queries\Prenotazioni;

class InformazioniPrenotazione
{

    /** @var Prenotazioni[] */
    private array $prenotazioni;

    /**
     * @param Prenotazioni ...$reservations
     */
    public function __construct(Prenotazioni ...$reservations)
    {
        $this->prenotazioni = $reservations;
    }

    /**
     * @return Prenotazioni[]
     */
    public function getPrenotazioni(): array
    {
        return $this->prenotazioni;
    }

    public function equals(mixed $informazioniPrenotazione): bool
    {
        if (! $informazioniPrenotazione instanceof self) {
            return false;
        }

        if (count($this->prenotazioni) !== count($informazioniPrenotazione->prenotazioni)) {
            return false;
        }

        foreach ($this->prenotazioni as $prenotazione) {
            if (! in_array($prenotazione, $informazioniPrenotazione->prenotazioni, true)) {
                return false;
            }
        }

        return true;
    }

    public function getHashCode(): string
    {
        if (empty($this->prenotazioni)) {
            return '0';
        }

        return md5(serialize($this->prenotazioni));
    }


}
