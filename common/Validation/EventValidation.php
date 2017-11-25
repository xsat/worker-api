<?php

namespace Common\Validation;

use Nen\Validation\Validation;
use Nen\Validation\Validator\Maximum;
use Nen\Validation\Validator\Presence;
use Nen\Validation\Validator\Url;

/**
 * Class EventValidation
 */
class EventValidation extends Validation
{
    /**
     * EventValidation constructor.
     */
    public function __construct()
    {
        parent::__construct([
            new Presence('name', 'Field `name` is required'),
            new Maximum('name', 255, 'Field `name` must not exceed 255 characters long'),

            new Presence('link', 'Field `link` is required'),
            new Url('link', 'Field `link` is not url'),
            new Maximum('link', 255, 'Field `link` must not exceed 255 characters long'),
        ]);
    }
}
