<?php

namespace PandaZoom\LaravelUserTimezone\Models;

use Carbon\CarbonInterface;

/**
 * Trait HasTimestampCreatedAt
 * @package PandaZoom\LaravelUserTimezone\Models
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait HasTimestampCreatedAt
{
    use HasTimestampByTimezone;

    /**
     * @param \DateTimeInterface|CarbonInterface|string|null $value
     * @return void
     */
    public function setCreatedAtAttribute($value): void
    {
        $this->attributes[$this->getCreatedAtColumn()] = $this->prepareTimestampByTzBeforeStore($value);
    }

    public function getCreatedAtAttribute($value): ?CarbonInterface
    {
        return $this->getTimestampByTimezone($value);
    }
}
