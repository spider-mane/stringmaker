<?php

namespace WebTheory\Stringmaker;

use WebTheory\Stringmaker\Interfaces\InterpolationResolverInterface;

class BasicResolver implements InterpolationResolverInterface
{
    /**
     *
     */
    protected $value;

    /**
     *
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     *
     */
    public function resolve(string $param): string
    {
        return $this->value;
    }
}
