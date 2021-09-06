<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use JsonSerializable;
use JustCoded\FundAmerica\Concerns\Arrayable;
use ReflectionException;
use ReflectionProperty;

abstract class Resource implements Arrayable, JsonSerializable
{
    public const DATE_FORMAT = 'Y-m-d';

    /**
     * Dates
     *
     * @var array
     * TODO: replace with $casts
     */
    protected $toDates = [];

    /**
     * Dates
     *
     * @var array
     * TODO: replace with $casts
     */
    protected $toObjects = [];

    /**
     * @param object|iterable|string|null $response
     */
    public function __construct($response = null)
    {
        if (! $response) {
            return;
        }

        if (is_string($response)) {
            $response = json_decode($response);
        }

        foreach ($response as $key => $value) {
            if (! property_exists($this, $key)) {
                continue;
            }

            if ((new ReflectionProperty($this, $key))->isPublic()) {
                $this->{$key} = $this->parseValue($key, $value);

                continue;
            }

            $setter = 'set' . Str::studly($key);

            if (method_exists($this, $setter)) {
                $this->{$setter}($this->parseValue($key, $value));
            }
        }
    }

    /**
     * @param null $response
     *
     * @return static
     */
    public static function make($response = null): self
    {
        return new static($response);
    }

    /**
     * Get Id
     *
     * @return mixed
     */
    abstract public function getId();

    /**
     * To Array
     *
     * @return array
     * @throws ReflectionException
     */
    public function toArray(): array
    {
        $resource = array_filter(object_properties($this));

        foreach ($resource as $key => $value) {
            if ($value instanceof Arrayable) {
                $resource[$key] = $value->toArray();

                continue;
            }

            if ($value instanceof CarbonInterface) {
                $resource[$key] = $value->format(static::DATE_FORMAT);

                continue;
            }

            if (is_array($value) && Arr::first($value) instanceof Arrayable) {
                $array = [];
                foreach ($value as $item) {
                    $array[] = $item->toArray();
                }

                $resource[$key] = $array;
            }
        }

        return $resource;
    }

    /**
     * Parse Value
     *
     * @param $key
     * @param $value
     *
     * @return Carbon|CarbonInterface
     */
    protected function parseValue($key, $value)
    {
        if (array_key_exists($key, $this->toDates)) {
            return Carbon::parse($value);
        }

        if (array_key_exists($key, $this->toObjects) && is_array($value)) {
            return new $this->toObjects[$key]($value);
        }

        return $value;
    }

    /**
     * @return string
     * @throws ReflectionException
     */
    public function jsonSerialize(): string
    {
        return json_encode($this->toArray());
    }
}
