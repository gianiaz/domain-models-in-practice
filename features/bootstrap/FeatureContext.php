<?php
declare(strict_types=1);

namespace Workshop\DDD\Cinema\Test;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Workshop\DDD\Cinema\Customer;
use Workshop\DDD\Cinema\Event\SeatReserved;
use Workshop\DDD\Cinema\Screening;
use Workshop\DDD\Cinema\ScreeningState;
use function PHPUnit\Framework\assertEquals;

class FeatureContext implements Context
{
    private Screening $screening;
    private ScreeningState $screeningState;

    /**
     * @When The Customer reserve a Seat
     */
    public function theCustomerReserveASeat()
    {
        $event = new SeatReserved();
        $this->screeningState->apply($event);
    }

    /**
     * @Then The Seat is reserved
     */
    public function theSeatIsReserved()
    {
        throw new PendingException();
    }

    /**
     * @Given /^a Screening with (\d+) seats$/
     */
    public function aScreeningWithSeats(int $seats)
    {
        $this->screeningState = new ScreeningState([]);

        $this->screening = new Screening($this->screeningState);
    }

    /**
     * @Then /^The Seats available are (\d+)$/
     */
    public function theSeatsAvailableAre($expectedSeats)
    {
        assertEquals($this->screening->availableSeat(), $expectedSeats, 'seat not reserved');
    }
}
