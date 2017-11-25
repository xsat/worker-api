<?php

namespace Common\Formatter;

use Common\Model\Log;
use Nen\Formatter\FormatterInterface;

/**
 * Class LogFormatter
 */
class LogFormatter implements FormatterInterface
{
    /**
     * @var Log
     */
    private $log;

    /**
     * LogFormatter constructor.
     *
     * @param Log $log
     */
    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    /**
     * @return array
     */
    public function format(): array
    {
        return [
            'logId' => $this->log->getLogId(),
            'content' => $this->log->getContent(),
            'createdAt' => $this->log->getCreatedAt(),
        ];
    }
}
