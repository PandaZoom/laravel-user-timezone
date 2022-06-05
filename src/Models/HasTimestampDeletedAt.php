<?php

namespace PandaZoom\LaravelUserTimezone\Models;

use Carbon\CarbonInterface;

/**
 * Trait HasTimestampDeletedAt
 * @package PandaZoom\LaravelUserTimezone\Models
 * @mixin \Illuminate\Database\Eloquent\Model
 * @mixin \Illuminate\Database\Eloquent\SoftDeletes
 */
trait HasTimestampDeletedAt
{
    use HasTimestampByTimezone;

    /**
     * @param \DateTimeInterface|CarbonInterface|string|null $value
     * @return void
     */
    public function setDeletedAtAttribute($value): void
    {
        $this->attributes[$this->getDeletedAtColumn()] = $this->prepareTimestampByTzBeforeStore($value);
    }

    public function getDeletedAtAttribute($value): ?CarbonInterface
    {
        return $this->getTimestampByTimezone($value);
    }
}
