<?php

namespace PandaZoom\LaravelUserTimezone\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\ServiceProvider;
use function base_path;

/**
 * @OA\Parameter(
 *  parameter="timezone",
 *  name="timezone",
 *  description="Timezone",
 *  in="query",
 *  required=false,
 *  @OA\Schema(
 *      type="string",
 *      format="timezone",
 *    ),
 *  )
 */
class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../../database/migrations/' => base_path('/database/migrations'),
            ], 'timezone-migrations');
        }

        Date::use(CarbonImmutable::class);
    }
}
