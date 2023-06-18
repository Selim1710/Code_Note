<?php

/*

////////////////// Global variable in laravel //////////////////

// goto AppServiceProvider.php:

public function boot()
{
    view()->composer('*', function ($view) {
        $view->with('user', Auth::user());
        $view->with('social', Social::all()); 
    });
}

*/
