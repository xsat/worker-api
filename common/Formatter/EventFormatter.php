<?php

namespace Common\Formatter;

use Common\Model\Event;
use Nen\Formatter\FormatterInterface;

/**
 * Class EventFormatter
 */
class EventFormatter implements FormatterInterface
{
    /**
     * @var Event
     */
    private $event;

    /**
     * EventFormatter constructor.
     *
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * @return array
     */
    public function format(): array
    {
        return [
            'eventId' => $this->event->getEventId(),
            'taskType' => $this->event->getTaskType(),
            'link' => $this->event->getLink(),
            'payload' => $this->event->getPayload(),
        ];
    }
}
