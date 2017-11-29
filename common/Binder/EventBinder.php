<?php

namespace Common\Binder;

use Nen\Binder\Binder;

/**
 * Class EventBinder
 */
class EventBinder extends Binder
{
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
     * @return null|string
     */
    public function getTaskType(): ?string
    {
        return $this->task_type;
    }

    /**
     * @param null|string $task_type
     */
    public function setTaskType(?string $task_type)
    {
        $this->task_type = $task_type;
    }

    /**
     * @return null|string
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param null|string $link
     */
    public function setLink(?string $link): void
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
