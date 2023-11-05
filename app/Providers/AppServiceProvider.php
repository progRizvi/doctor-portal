<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $searchTerm = trim($searchTerm);
            $this->where(static function (Builder $query) use ($searchTerm, $attributes) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(Str::contains($attribute, '.'), static function (Builder $query) use ($searchTerm, $attribute) {
                        [$relationName, $relationAttribute] = explode('.', $attribute);
                        $query->orWhereHas($relationName, static function (Builder $query) use ($relationAttribute, $searchTerm) {
                            $query->where($relationAttribute, 'LIKE', "{$searchTerm}%");
                        });
                    }, static function (Builder $query) use ($attribute, $searchTerm) {
                        $query->orWhere($attribute, 'LIKE', "{$searchTerm}%");
                    });
                }
            });

            return $this;
        });

        if (!app()->runningInConsole()) {
            if (Schema::hasTable('settings')) {
                $settings = Setting::first();
                View::share('settings', $settings);
            }
        }
    }
}
