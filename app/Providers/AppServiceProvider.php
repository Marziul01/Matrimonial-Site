<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $unseenMessageCount = 0;
            $siteSetting = null;
    
            // Check if the user is authenticated
            if (Auth::check()) {
                $unseenMessageCount = DB::table('ch_messages')
                    ->where('to_id', Auth::user()->id)
                    ->where('seen', '0')
                    ->count();
            }
    
            // Fetch the site setting with ID 1
            $siteSetting = SiteSetting::find(1);
    
            // Share unseenMessageCount and siteSetting with all views
            $view->with([
                'unseenMessageCount' => $unseenMessageCount,
                'siteSetting' => $siteSetting,
            ]);
        });
        Paginator::useBootstrapFive();
    }
}
