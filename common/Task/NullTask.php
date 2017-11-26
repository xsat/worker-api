<?php

namespace Common\Task;

/**
 * Class NullTask
 */
class NullTask implements TaskInterface
{
    public function process(): void
    {
        // Do nothing ...
    }
}
