<?php

namespace WebTheory\Stringmaker;

use WebTheory\Stringmaker\Interfaces\InterpolationResolverInterface;

class MapResolver implements InterpolationResolverInterface
{
    /**
     *
     */
    protected $valueMap;

    /**
     *
     */
    public function __construct(array $valueMap)
    {
        $this->valueMap = $valueMap;
    }

    /**
     *
     */
    public function resolve(string $param): string
    {
        return $this->valueMap[$param];
    }

    /**
     * Get the value of valueMap
     *
     * @return mixed
     */
    public function getValueMap()
    {
        return $this->valueMap;
    }

    /**
     *
     */
    public function addValue(string $param, string $value)
    {
        $this->valueMap[$param] = $value;

        return $this;
    }
}
