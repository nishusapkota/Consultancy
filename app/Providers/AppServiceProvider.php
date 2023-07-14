<?php

namespace App\Providers;

use App\Models\Footer;
use App\Models\SocialMedia;
use Illuminate\Support\ServiceProvider;

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
        view()->composer(['frontend/layouts/headers/homePageHeader',
        'frontend/layouts/headers/otherPageHeader',
        'frontend/layouts/footer'], function ($view) {
            $footer=Footer::first();
            $socialMedias=SocialMedia::where('status','1')->get();
            $view->with('footer',$footer)->with('socialMedias', $socialMedias);;
        });
    }
}
