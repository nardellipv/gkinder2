<?php

namespace gkinder\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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

        View::composer(['tutor.menu.menu'], 'gkinder\Http\CounterView\CounterMailsTutor');
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
