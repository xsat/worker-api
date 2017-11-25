<?php

namespace Common\Validation;

use Nen\Validation\Validation;
use Nen\Validation\Validator\Numerical;

/**
 * Class ListValidation
 */
class ListValidation extends Validation
{
    /**
     * ListValidation constructor.
     */
    public function __construct()
    {
        parent::__construct([
            new Numerical('offset', 'Field `offset` must be numeric'),

            new Numerical('limit', 'Field `limit` must be numeric'),
        ]);
    }
}
