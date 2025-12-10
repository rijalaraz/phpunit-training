<?php

namespace Src;

/**
 * Temperature service
 *
 * An unfinished temperature service example class
 */
interface TemperatureService
{
    /**
     * Get the temperature at a specific time
     *
     * @param string $time The time hh:mm
     *
     * @return int
     */
    public function getTemperature(string $time): int;
}
