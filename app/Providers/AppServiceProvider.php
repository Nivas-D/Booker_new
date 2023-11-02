<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Item;
use App\Models\User;
use App\Models\Cart;
use App\Observers\ItemObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
//use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Item::observe(ItemObserver::class);
        User::observe(UserObserver::class);


        View::composer('*', function ($view) {
            $userId = Auth::check() ? Auth::id() : null;
            //echo '------'.$userId.'===';
            //$view->with('userId', $userId);
            View::share('cart_count', DB::select("SELECT COUNT(*) as total_items from cart where user_id='".$userId."'"));
        });

        
        //View::share('cart_count', DB::select("SELECT COUNT(*) as CC from cart where user_id='".Auth::id()."'"));
        //$user = Auth::user();
        // $user = Request::user();
        // if (Auth::check())
        // {
        //     View::share('cart_count', DB::select("SELECT COUNT(*) as CC from cart where user_id='".Request::user()->id."'"));
        // }else{
        //     View::share('cart_count', '0');
        // }
        // if (Auth::check()) {
        //     $userid =  Auth::user()->id;
        // }else{
        //     $userid =  0; 
        // }
        //echo $userid.'------------------'.$user;
        //View::share('cart_count', DB::select("SELECT COUNT(*) as CC from cart where user_id='".$userid."'"));
        // $cart_count = 0;

        // if (Auth::check()) {
        //    $userid =  Auth::user()->id;
        //    //Log::info('userid :', [$userid]);


        //    $cart_count = Cart::where('user_id',Auth::user()->id)->count();
        // }

        // View::composer('*', function($view)
        // {
        //     if (Auth::check()){
        //         $cart_count = Cart::where('user_id',Auth::id() )->count();
        //     }else{
        //         $cart_count = 0;
        //     }
        // });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
