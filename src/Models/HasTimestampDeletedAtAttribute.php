<?php

namespace PandaZoom\LaravelUserTimezone\Models;

use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Trait HasTimestampDeletedAtAttribute
 * @package PandaZoom\LaravelUserTimezone\Models
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait HasTimestampDeletedAtAttribute
{
    use HasTimestampByTimezone;

    public function deletedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value): ?CarbonInterface => $this->getTimestampByTimezone($value),
            set: fn($value): ?CarbonImmutable => $this->prepareTimestampByTzBeforeStore($value),
        );
    }
}
