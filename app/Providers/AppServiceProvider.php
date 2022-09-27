<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use Helper,Request;
use Illuminate\Support\Facades\Auth;

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
        if(Request::get('ref')){
            $ref = Request::get('ref');
            Session::put('ref', $ref);
        }else{
            $ref = 0;
            Session::put('ref', $ref);
        }
      
        Helper::total_view_start();
        Inertia::share([
            'errors' => function () {
                return Session::get('errors')
                    ? Session::get('errors')->getBag('default')->getMessages()
                    : (object) [];
            }
        ]);
  
        Inertia::share('flash', function () {
            return [
                'message' => Session::get('message'),
            ];
        });

            if (Auth::user()){
            $username0 = "/@".Auth::user()->username;
            Inertia::share('ltusername',"$username0");
            }else{
            $username0 =  null;
            Inertia::share('ltusername',"$username0");
            }
       

        // $this->app->bind('path.public', function() {
        //     return base_path().'/';
        // });
    }
}
