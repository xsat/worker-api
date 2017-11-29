<?php

namespace Common\Model;

use Nen\Model\Model;

/**
 * Class Event
 */
class Event extends Model
{
    /**
     * @var int
     */
    private $event_id;

    /**
     * @var string
     */
    private $task_type;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $payload;

    /**
     * @return int|null
     */
    public function getEventId(): ?int
    {
        return $this->event_id;
    }

    /**
     * @param int|null $event_id
     */
    public function setEventId(?int $event_id): void
    {
        $this->event_id = $event_id;
    }

    /**
     * @return string
     */
    public function getTaskType(): string
    {
        return $this->task_type;
    }

    /**
     * @param string $task_type
     */
    public function setTaskType(string $task_type)
    {
        $this->task_type = $task_type;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return null|string
     */
    public function getPayload(): ?string
    {
        return $this->payload;
    }

    /**
     * @param null|string $payload
     */
    public function setPayload(?string $payload): void
    {
        $this->payload = $payload;
    }
}
