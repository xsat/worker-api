<?php

namespace Common\Formatter;

use Common\Binder\ListBinder;
use Common\Model\Event;
use Nen\Formatter\FormatterInterface;

/**
 * Class EventListFormatter
 */
class EventListFormatter implements FormatterInterface
{
    /**
     * @var int
     */
    private $total;

    /**
     * @var int
     */
    private $count;

    /**
     * @var Event[]
     */
    private $events = [];

    /**
     * @var ListBinder
     */
    private $binder;

    /**
     * EventListFormatter constructor.
     *
     * @param int $total
     * @param Event[] $events
     * @param ListBinder $binder
     */
    public function __construct(
        int $total,
        array $events,
        ListBinder $binder
    )
    {
        $this->total = $total;
        $this->count = count($events);
        $this->events = $events;
        $this->binder = $binder;
    }

    /**
     * @return array
     */
    public function format(): array
    {
        $items = [];

        foreach ($this->events as $event) {
            $items[] = (new EventFormatter($event))->format();
        }

        return [
            'total' => $this->total,
            'count' => $this->count,
            'offset' => $this->binder->getOffset(),
            'limit' => $this->binder->getLimit(),
            'items' => $items,
        ];
    }
}
