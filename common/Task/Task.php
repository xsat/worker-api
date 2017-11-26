<?php

namespace Common\Task;

/**
 * Class Task
 */
abstract class Task implements TaskInterface
{
    /**
     * @var array
     */
    protected $payload;

    /**
     * Task constructor.
     *
     * @param array|null $payload
     */
    public function __construct(?array $payload)
    {
        $this->payload = $payload;
    }
}
