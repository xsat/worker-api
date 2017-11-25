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
    private $name;

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
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
