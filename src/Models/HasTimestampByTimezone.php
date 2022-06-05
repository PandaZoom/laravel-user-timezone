<?php

namespace PandaZoom\LaravelUserTimezone\Models;

use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use DateTimeInterface;
use PandaZoom\LaravelUserTimezone\Services\TimezoneService;
use function config;

trait HasTimestampByTimezone
{
    /**
     * @param \DateTimeInterface|CarbonInterface|string|null $value
     * @return CarbonImmutable
     */
    public function getTimestampByTimezone($value): ?CarbonImmutable
    {
        return $value !== null
            ? CarbonImmutable::parse($value)->setTimezone(TimezoneService::getUserTimezone())
            : null;
    }

    public function prepareTimestampByTzBeforeStore(DateTimeInterface|CarbonInterface|string|null $value): ?CarbonImmutable
    {
        return $value !== null
            ? CarbonImmutable::parse($value, TimezoneService::getUserTimezone())
                ->setTimeZone(config('app.timezone'))
            : null;
    }
}
