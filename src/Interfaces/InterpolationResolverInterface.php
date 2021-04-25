<?php

namespace WebTheory\Stringmaker\Interfaces;

interface InterpolationResolverInterface
{
    /**
     *
     */
    public function resolve(string $param): string;
}
