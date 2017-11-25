<?php

namespace Common\Mapper;

use Common\Binder\ListBinder;
use Common\Model\Log;

/**
 * Class LogMapper
 */
class LogMapper extends Mapper
{
    /**
     * @return string
     */
    protected function getSource(): string
    {
        return 'log';
    }

    /**
     * @param int $log_id
     *
     * @return Log|null
     */
    public function get(int $log_id): ?Log
    {
        if (!isset($this->data[$log_id])) {
            return null;
        }

        return new Log($this->data[$log_id]);
    }

    /**
     * @param Log $log
     */
    public function create(Log $log): void
    {
        $last = end($this->data);

        if (!$last) {
            $log->setLogId(1);
        } else {
            $log->setLogId((new Log($last))->getLogId() + 1);
        }

        $this->update($log);
    }

    /**
     * @param Log $log
     */
    public function update(Log $log): void
    {
        $this->data[$log->getLogId()] = $this->convert($log);
    }

    /**
     * @param Log $log
     *
     * @return array
     */
    private function convert(Log $log): array
    {
        return [
            'logId' => $log->getLogId(),
            'content' => $log->getContent(),
            'createdAt' => $log->getCreatedAt()?? date('c'),
        ];
    }

    /**
     * @param Log $log
     */
    public function delete(Log $log): void
    {
        unset($this->data[$log->getLogId()]);
    }

    /**
     * @param ListBinder $binder
     *
     * @return Log[]
     */
    public function getList(ListBinder $binder): array
    {
        $logs = [];

        foreach (array_slice(
                     $this->data,
                     $binder->getOffset(),
                     $binder->getLimit()
                 ) as $log) {
            $logs[] = new Log($log);
        }

        return $logs;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return count($this->data);
    }
}
