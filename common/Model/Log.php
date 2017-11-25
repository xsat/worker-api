<?php

namespace Common\Model;

use Nen\Model\Model;

/**
 * Class Log
 */
class Log extends Model
{
    /**
     * @var int
     */
    private $log_id;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $created_at;

    /**
     * @return int|null
     */
    public function getLogId(): ?int
    {
        return $this->log_id;
    }

    /**
     * @param int|null $log_id
     */
    public function setLogId(?int $log_id)
    {
        $this->log_id = $log_id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return null|string
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @param null|string $created_at
     */
    public function setCreatedAt(?string $created_at)
    {
        $this->created_at = $created_at;
    }
}
