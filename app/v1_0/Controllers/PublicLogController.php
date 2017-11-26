<?php

namespace App\v1_0\Controllers;

use Common\Binder\ListBinder;
use Common\Formatter\LogListFormatter;
use Common\Mapper\LogMapper;
use Common\Validation\ListValidation;
use Nen\Exception\ValidationException;

/**
 * Class PublicLogController
 */
class PublicLogController extends Controller
{
    /**
     * @throws ValidationException If the validation is failed
     */
    public function listAction(): void
    {
        $validation = new ListValidation();
        $binder = new ListBinder($this->request->getQuery() ?? []);

        if (!$validation->validate($binder)) {
            throw new ValidationException($validation);
        }

        $mapper = new LogMapper();

        $this->format(
            new LogListFormatter(
                $mapper->getTotal(),
                $mapper->getList($binder),
                $binder
            )
        );
    }
}
