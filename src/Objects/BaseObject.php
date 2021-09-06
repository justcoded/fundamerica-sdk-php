<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Objects;

use JsonSerializable;
use JustCoded\FundAmerica\Concerns\Arrayable;
use ReflectionException;

abstract class BaseObject implements Arrayable, JsonSerializable
{
    /**
     * To Objects
     *
     * @var array
     */
    protected $toObjects = [];

    /**
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        foreach ($params as $key => $value) {
            if (is_numeric($key) && is_array($value)) {
                $array = [];

                foreach ($value as $field => $item) {
                    $array[] = new static($item);
                }

                return $array;
            }

            if (property_exists($this, $key)) {
                $this->{$key} = $this->parseValue($key, $value);
            }
        }
    }

    /**
     * Parse Value
     *
     * @param $key
     * @param $value
     *
     * @return mixed
     */
    protected function parseValue($key, $value)
    {
        if (array_key_exists($key, $this->toObjects) && is_array($value)) {
            return new $this->toObjects[$key]($value);
        }

        return $value;
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public function toArray(): array
    {
        return array_filter(object_properties($this));
    }

    /**
     * @return string
     * @throws ReflectionException
     */
    public function jsonSerialize(): string
    {
        return json_encode(object_properties($this));
    }
}
