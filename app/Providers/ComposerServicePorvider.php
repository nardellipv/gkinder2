<?php

namespace gkinder\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ComposerServicePorvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['school.menu.menu'], 'gkinder\Http\CounterView\CounterMails');
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
