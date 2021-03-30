<?php
declare(strict_types=1);

namespace DDD\Domain\ValueTypes;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

abstract class UUIDObject
{

    private UuidInterface $uuid;

    public function __construct(string $uuid = null)
    {
        $this->uuid = $uuid
            ? Uuid::fromString($uuid)
            : Uuid::uuid4();
    }

    public function equals(self $uuid): bool
    {
        return $this->uuid->equals($uuid->uuid);
    }

    public function toString(): string
    {
        return $this->uuid->toString();
    }

}
