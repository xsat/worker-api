<?php

namespace Common\Task;

/**
 * Class PayloadTask
 */
abstract class PayloadTask implements TaskInterface
{
    /**
     * @var array
     */
    protected $payload;

    /**
     * PayloadTask constructor.
     *
     * @param array|null $payload
     */
    public function __construct(?array $payload)
    {
        $this->payload = $payload;
    }
}
