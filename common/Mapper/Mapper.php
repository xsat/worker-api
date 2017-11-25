<?php

namespace Common\Mapper;

/**
 * Class Mapper
 */
abstract class Mapper
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * Mapper constructor.
     */
    public final function __construct()
    {
        $this->data = json_decode(
            file_get_contents($this->getFileName()),
            true
        ) ?: [];
    }

    /**
     * Mapper constructor.
     */
    public final function __destruct()
    {
        file_put_contents(
            $this->getFileName(),
            json_encode($this->data)
        );
    }

    /**
     * @return string
     */
    private function getFileName(): string
    {
        return DATA_DIR . $this->getSource() . '.json';
    }

    /**
     * @return string
     */
    protected abstract function getSource(): string;
}
