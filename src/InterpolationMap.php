<?php

namespace WebTheory\Stringmaker;

use WebTheory\Stringmaker\Interfaces\InterpolationMapInterface;
use WebTheory\Stringmaker\Interfaces\InterpolationResolverInterface;

class InterpolationMap implements InterpolationMapInterface
{
    /**
     * @var InterpolationResolverInterface
     */
    protected $map = [];

    /**
     *
     */
    public function __construct(array $map)
    {
        $this->buildMap($map);
    }

    /**
     *
     */
    protected function buildMap(array $map)
    {
        foreach ($map as $for => $with) {
            $this->resolve($for, $with);
        }

        return $this;
    }

    /**
     *
     */
    public function resolve(string $for, InterpolationResolverInterface $with)
    {
        $this->map[$for] = $with;
    }

    /**
     *
     */
    public function getResolver(string $param): InterpolationResolverInterface
    {
        return $this->map[$param];
    }

    /**
     *
     */
    public function getVal(string $param): string
    {
        return $this->getResolver($param)->resolve($param);
    }
}
