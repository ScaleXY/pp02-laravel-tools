<?php

namespace ScaleXY\Tools\Attributes;

use Attribute;
use InvalidArgumentException;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class AutoRun
{
    private const EVENT_ALIASES = [
        'creating' => ['creating'],
        'created' => ['created'],
        'updating' => ['updating'],
        'updated' => ['updated'],
        'deleting' => ['deleting'],
        'deleted' => ['deleted'],
        'mutating' => ['creating', 'updating', 'deleting'],
        'mutated' => ['created', 'updated', 'deleted'],
    ];

    /**
     * @var list<string>
     */
    private array $events;

    public function __construct(string ...$events)
    {
        if ($events === []) {
            throw new InvalidArgumentException('AutoRun requires at least one event.');
        }

        $events = array_values(array_unique(array_map(
            static fn (string $event): string => strtolower(trim($event)),
            $events
        )));

        foreach ($events as $event) {
            if (! isset(self::EVENT_ALIASES[$event])) {
                throw new InvalidArgumentException("Unsupported AutoRun event [{$event}].");
            }
        }

        $this->events = $events;
    }

    /**
     * @return list<string>
     */
    public function lifecycleEvents(): array
    {
        return array_values(array_unique(array_merge(
            ...array_map(static fn (string $event): array => self::EVENT_ALIASES[$event], $this->events)
        )));
    }
}
