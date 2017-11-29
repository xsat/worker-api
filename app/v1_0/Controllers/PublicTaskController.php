<?php

namespace App\v1_0\Controllers;

use Common\Binder\TaskBinder;
use Common\Task\TaskFactory;
use Common\Validation\TaskValidation;
use Nen\Exception\ValidationException;

/**
 * Class PublicTaskController
 */
class PublicTaskController extends Controller
{
    /**
     * @throws ValidationException If the validation is failed
     */
    public function processAction(): void
    {
        $validation = new TaskValidation();
        $binder = new TaskBinder($this->request->getPut() ?? []);

        if (!$validation->validate($binder)) {
            throw new ValidationException($validation);
        }

        (new TaskFactory())->build($binder)->process();

        $this->response();
    }
}
