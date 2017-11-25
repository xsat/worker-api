<?php

namespace App\v1_0\Controllers;

use Common\Binder\EventBinder;
use Common\Binder\ListBinder;
use Common\Formatter\EventFormatter;
use Common\Formatter\EventListFormatter;
use Common\Mapper\EventMapper;
use Common\Model\Event;
use Common\Validation\EventValidation;
use Common\Validation\ListValidation;
use Nen\Exception\NotFoundException;
use Nen\Exception\ValidationException;

/**
 * Class PublicEventController
 */
class PublicEventController extends Controller
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

        $mapper = new EventMapper();

        $this->format(
            new EventListFormatter(
                $mapper->getTotal(),
                $mapper->getList($binder),
                $binder
            )
        );
    }

    /**
     * @throws ValidationException If the validation is failed
     */
    public function createAction(): void
    {
        $validation = new EventValidation();
        $binder = new EventBinder($this->request->getPut() ?? []);

        if (!$validation->validate($binder)) {
            throw new ValidationException($validation);
        }

        $event = new Event();
        $event->setName($binder->getName());
        $event->setLink($binder->getLink());
        $event->setPayload($binder->getPayload());

        (new EventMapper())->create($event);

        $this->format(new EventFormatter($event));
    }

    /**
     * @param int $event_id
     *
     * @throws NotFoundException If the event is not found
     */
    public function viewAction(int $event_id): void
    {
        $event = (new EventMapper())->get($event_id);

        if (!$event) {
            throw new NotFoundException('Event not found');
        }

        $this->format(new EventFormatter($event));
    }

    /**
     * @param int $event_id
     *
     * @throws NotFoundException If the event is not found
     * @throws ValidationException If the validation is failed
     */
    public function updateAction(int $event_id): void
    {
        $mapper = new EventMapper();
        $event = $mapper->get($event_id);

        if (!$event) {
            throw new NotFoundException('Event not found');
        }

        $validation = new EventValidation();
        $binder = new EventBinder($this->request->getPut() ?? []);

        if (!$validation->validate($binder)) {
            throw new ValidationException($validation);
        }

        $event->setName($binder->getName());
        $event->setLink($binder->getLink());
        $event->setPayload($binder->getPayload());
        $mapper->update($event);

        $this->response();
    }

    /**
     * @param int $eventId
     *
     * @throws NotFoundException If the event is not found
     */
    public function deleteAction(int $eventId): void
    {
        $mapper = new EventMapper();
        $event = $mapper->get($eventId);

        if (!$event) {
            throw new NotFoundException('Event not found');
        }

        $mapper->delete($event);

        $this->response();
    }
}
