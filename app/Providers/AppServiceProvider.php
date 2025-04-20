<?php

namespace App\Providers;

use App\Models\GraduationYearGroup;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local') && class_exists(\Laravel\Telescope\TelescopeServiceProvider::class)) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        foreach (glob(app_path('Helpers/*.php')) as $helper) {
            require_once $helper;
        }

        if (
            class_exists(DB::class) &&
            DB::getSchemaBuilder()->hasTable((new GraduationYearGroup())->getTable()) &&
            DB::getSchemaBuilder()->hasTable((new User())->getTable())
        ) {
            View::share('graduationYearGroups', GraduationYearGroup::all());
            View::share('users', User::all());
            View::share('emptyAlumniUsers', User::where('role', 'alumni')->whereDoesntHave('alumniBiodata')->get());
            View::share('alumniUsers', User::where('role', 'alumni')->get());
        }
    }
}

