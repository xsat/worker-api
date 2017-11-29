<?php

namespace Common\Task;

use Common\Mapper\EventMapper;
use Common\Mapper\LogMapper;
use Common\Model\Log;
use Common\Model\Task;
use GuzzleHttp\Client;

/**
 * Class LogTask
 */
class LogTask extends PayloadTask
{
    public function process(): void
    {
        $logMapper = new LogMapper();
        $logMapper->create(new Log(
            [
                'content' => 'Log task processing',
            ]
        ));

        $events = (new EventMapper())->getByTaskType(Task::TYPE_LOG);
        $client = new Client();

        foreach ($events as $event) {
            try {
                $client->post($event->getLink(), ['body' => $event->getPayload()]);

                $logMapper->create(new Log(
                    [
                        'content' => $event->getEventId() . ' event was sent',
                    ]
                ));
            } catch (\Exception $exception) {
                $logMapper->create(new Log(
                    [
                        'content' => $event->getEventId() . ' event was failed: ' . $exception->getMessage(),
                    ]
                ));
            }
        }

        $logMapper->create(new Log(
            [
                'content' => 'Log task was processed',
            ]
        ));
    }
}
