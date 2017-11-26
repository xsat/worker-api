<?php

namespace Common\Task;

use Common\Binder\TaskBinder;
use Common\Model\Task;

/**
 * Class TaskFactory
 */
class TaskFactory
{
    /**
     * @var array
     */
    private $types = [
        Task::TYPE_HELLO => HelloTask::class,
    ];

    /**
     * @param TaskBinder $binder
     *
     * @return TaskInterface
     */
    public function build(TaskBinder $binder): TaskInterface
    {
        if (!isset($this->types[$binder->getType()])) {
            return new NullTask();
        }

        $className = $this->types[$binder->getType()];

        return new $className($binder->getPayload());
    }
}
