<?php

namespace PandaZoom\LaravelUserTimezone\Models;

use Carbon\CarbonInterface;

/**
 * Trait HasTimestampUpdatedAt
 * @package PandaZoom\LaravelUserTimezone\Models
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait HasTimestampUpdatedAt
{
    use HasTimestampByTimezone;

    /**
     * @param  \DateTimeInterface|CarbonInterface|string|null  $value
     * @return void
     */
    public function setUpdatedAtAttribute($value): void
    {
        $this->attributes[$this->getUpdatedAtColumn()] = $this->prepareTimestampByTzBeforeStore($value);
    }

    public function getUpdatedAtAttribute($value): ?CarbonInterface
    {
        return $this->getTimestampByTimezone($value);
    }
}
