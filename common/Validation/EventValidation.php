<?php

namespace Common\Validation;

use Common\Model\Task;
use Nen\Validation\Validation;
use Nen\Validation\Validator\Maximum;
use Nen\Validation\Validator\Presence;
use Nen\Validation\Validator\Range;
use Nen\Validation\Validator\Url;

/**
 * Class EventValidation
 */
class EventValidation extends Validation
{
    /**
     * @var array
     */
    private $taskTypes = [
        Task::TYPE_HELLO,
        Task::TYPE_LOG,
    ];

    /**
     * EventValidation constructor.
     */
    public function __construct()
    {
        parent::__construct([
            new Presence('taskType', 'Field `taskType` is required'),
            new Range('taskType', $this->taskTypes, 'Field `taskType` is invalid'),

            new Presence('link', 'Field `link` is required'),
            new Url('link', 'Field `link` is not url'),
            new Maximum('link', 255, 'Field `link` must not exceed 255 characters long'),
        ]);
    }
}
