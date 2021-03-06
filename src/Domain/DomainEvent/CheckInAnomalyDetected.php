<?php

declare(strict_types=1);

namespace Building\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Rhumsaa\Uuid\Uuid;

final class CheckInAnomalyDetected extends AggregateChanged
{
    public static function fromUser($username, $buildingId)
    {
        return self::occur(
            (string) $buildingId,
            [
                'username' => $username,
            ]
        );
    }

    public function buildingId() : string
    {
        return Uuid::fromString($this->aggregateId());
    }

    public function username() : string
    {
        return $this->payload['username'];
    }
}
