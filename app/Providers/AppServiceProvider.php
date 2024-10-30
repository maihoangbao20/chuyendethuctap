<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use App\Models\Wishlist;

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
            $cartItemCount = 0;
            $wishlistItemCount = 0;

            if (Auth::check()) {
                $cartItemCount = Cart::where('user_id', Auth::id())->count();
                $wishlistItemCount = Wishlist::where('user_id', Auth::id())->count();
            }

            $view->with([
                'cartItemCount' => $cartItemCount,
                'wishlistItemCount' => $wishlistItemCount
            ]);
        });
    }
}
