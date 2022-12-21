<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setting = new Setting();


        view()->composer('frontend.*', function ($view) {

            $view->with([
                'setting' => $this->setting,
            ]);
        });
    }
}
