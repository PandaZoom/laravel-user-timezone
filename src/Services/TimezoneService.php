<?php

namespace PandaZoom\LaravelUserTimezone\Services;

use function auth;
use function config;

class TimezoneService
{
    public static function getUserTimezone(): string
    {
        return auth()->user()?->timezone ?? config('app.timezone');
    }
}
