<?php

declare(strict_types=1);

namespace FundAmerica\Objects;

use JsonSerializable;
use ReflectionException;

/**
 * Class Object
 *
 * @package App\Modules\FundAmerica\app\Sdk\Objects
 */
abstract class BaseObject implements JsonSerializable
{
    /**
     * To Objects
     *
     * @var array
     */
    protected $toObjects = [];

    /**
     * BaseObject constructor.
     *
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
     */
    public function toArray(): array
    {
        return array_filter(json_decode(json_encode($this)));
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
