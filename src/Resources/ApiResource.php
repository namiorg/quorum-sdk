<?php

namespace NAMI\QuorumSdk\Resources;

use NAMI\QuorumSdk\Quorum;
use ReflectionObject;
use ReflectionProperty;

class ApiResource
{
    public array $attributes = [];
    protected ?Quorum $quorum;

    public function __construct(array $attributes, Quorum $quorum = null)
    {
        $this->attributes = $attributes;
        $this->quorum = $quorum;
        $this->fill();
    }

    protected function fill(): void
    {
        foreach ($this->attributes as $key => $value) {
            $key = $this->camelCase($key);
            $this->{$key} = $value;
        }
    }

    protected function camelCase(string $key): string
    {
        $parts = explode('_', $key);
        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }
        return str_replace(' ', '', implode(' ', $parts));
    }

    public function __sleep()
    {
        $publicProperties = (new ReflectionObject($this))->getProperties(ReflectionProperty::IS_PUBLIC);
        $publicPropertyNames = array_map(function (ReflectionProperty $property) {
            return $property->getName();
        }, $publicProperties);
        return array_diff($publicPropertyNames, ['quorum', 'attributes']);
    }
}
