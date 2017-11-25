<?php

namespace Common\Binder;

use Nen\Binder\Binder;

/**
 * Class ListBinder
 */
class ListBinder extends Binder
{
    /**
     * @var int
     */
    private $offset = 0;

    /**
     * @var int
     */
    private $limit = 10;

    /**
     * @return int|null
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * @param int|null $offset
     */
    public function setOffset(?int $offset): void
    {
        $this->offset = $offset;
    }

    /**
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param int|null $limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }
}
