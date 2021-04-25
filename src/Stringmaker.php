<?php

namespace WebTheory\Stringmaker;

use WebTheory\Stringmaker\Interfaces\InterpolationMapInterface;
use WebTheory\Stringmaker\Interfaces\StringmakerInterface;

class Stringmaker implements StringmakerInterface
{
    /**
     * @var string
     */
    protected $template;

    /**
     * @var InterpolationMapInterface
     */
    protected $interpolationMap;

    /**
     *
     */
    public const PATTERN = '/{{(\w)}}/';

    /**
     *
     */
    public function __construct(string $template, InterpolationMapInterface $map)
    {
        $this->template = $template;
        $this->interpolationMap = $map;
    }

    /**
     * Get the value of template
     *
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * Get the value of interpolationMap
     *
     * @return InterpolationMapInterface
     */
    public function getInterpolationMap(): InterpolationMapInterface
    {
        return $this->interpolationMap;
    }

    /**
     *
     */
    public function getVal($param): string
    {
        return $this->interpolationMap->getVal($param);
    }

    /**
     *
     */
    public function activate(): string
    {
        return preg_replace_callback(
            static::PATTERN,
            function ($param) {
                return $this->getVal($param[1]);
            },
            $this->template
        );
    }

    /**
     *
     */
    public function __toString()
    {
        return $this->activate();
    }
}
