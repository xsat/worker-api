<?php

namespace Common\Formatter;

use Common\Binder\ListBinder;
use Common\Model\Log;
use Nen\Formatter\FormatterInterface;

/**
 * Class LogListFormatter
 */
class LogListFormatter implements FormatterInterface
{
    /**
     * @var int
     */
    private $total;

    /**
     * @var int
     */
    private $count;

    /**
     * @var Log[]
     */
    private $logs = [];

    /**
     * @var ListBinder
     */
    private $binder;

    /**
     * LogListFormatter constructor.
     *
     * @param int $total
     * @param Log[] $logs
     * @param ListBinder $binder
     */
    public function __construct(
        int $total,
        array $logs,
        ListBinder $binder
    )
    {
        $this->total = $total;
        $this->count = count($logs);
        $this->logs = $logs;
        $this->binder = $binder;
    }

    /**
     * @return array
     */
    public function format(): array
    {
        $items = [];

        foreach ($this->logs as $log) {
            $items[] = (new LogFormatter($log))->format();
        }

        return [
            'total' => $this->total,
            'count' => $this->count,
            'offset' => $this->binder->getOffset(),
            'limit' => $this->binder->getLimit(),
            'items' => $items,
        ];
    }
}
