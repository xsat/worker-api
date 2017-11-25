<?php

namespace Common\Mapper;

use Common\Binder\ListBinder;
use Common\Model\Event;

/**
 * Class EventMapper
 */
class EventMapper
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * EventMapper constructor.
     */
    public function __construct()
    {
        $this->data = json_decode(
            file_get_contents(DATA_DIR . 'events.json'),
            true
        ) ?: [];
    }

    /**
     * EventMapper constructor.
     */
    public function __destruct()
    {
        file_put_contents(
            DATA_DIR . 'events.json',
            json_encode($this->data)
        );
    }

    /**
     * @param int $event_id
     *
     * @return Event|null
     */
    public function get(int $event_id): ?Event
    {
        if (!isset($this->data[$event_id])) {
            return null;
        }

        return new Event($this->data[$event_id]);
    }

    /**
     * @param Event $event
     */
    public function create(Event $event): void
    {
        $last = end($this->data);

        if (!$last) {
            $event->setEventId(1);
        } else {
            $event->setEventId((new Event($last))->getEventId() + 1);
        }

        $this->update($event);
    }

    /**
     * @param Event $event
     */
    public function update(Event $event): void
    {
        $this->data[$event->getEventId()] = $this->convert($event);
    }

    /**
     * @param Event $event
     *
     * @return array
     */
    private function convert(Event $event): array
    {
        return [
            'eventId' => $event->getEventId(),
            'name' => $event->getName(),
            'link' => $event->getLink(),
            'payload' => $event->getPayload(),
        ];
    }

    /**
     * @param Event $event
     */
    public function delete(Event $event): void
    {
        unset($this->data[$event->getEventId()]);
    }

    /**
     * @param ListBinder $binder
     *
     * @return Event[]
     */
    public function getList(ListBinder $binder): array
    {
        $events = [];

        foreach (array_slice(
                     $this->data,
                     $binder->getOffset(),
                     $binder->getLimit()
                 ) as $event) {
            $events[] = new Event($event);
        }

        return $events;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return count($this->data);
    }
}
