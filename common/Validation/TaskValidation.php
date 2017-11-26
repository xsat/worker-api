<?php

namespace Common\Validation;

use Common\Model\Task;
use Nen\Validation\Validation;
use Nen\Validation\Validator\Presence;
use Nen\Validation\Validator\Range;

/**
 * Class TaskValidation
 */
class TaskValidation extends Validation
{
    /**
     * @var array
     */
    private $types = [
        Task::TYPE_HELLO,
    ];

    /**
     * TaskValidation constructor.
     */
    public function __construct()
    {
        parent::__construct([
            new Presence('type', 'Field `type` is required'),
            new Range('type', $this->types, 'Field `type` is invalid'),
        ]);
    }
}
