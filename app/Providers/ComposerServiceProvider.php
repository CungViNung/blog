<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('frontend.partials.aside', 'App\Http\ViewComposer\PostComposer');
        View::composer('frontend.partials.aside', 'App\Http\ViewComposer\CategoryComposer');
        View::composer('frontend.partials.header', 'App\Http\ViewComposer\MenuComposer');
        View::composer('frontend.partials.footer', 'App\Http\ViewComposer\FooterComposer');
        View::composer('frontend.pages.dashboard', 'App\Http\ViewComposer\ProfileComposer');
        View::composer('frontend.pages.adduserpost', 'App\Http\ViewComposer\AddPostComposer');
        
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
