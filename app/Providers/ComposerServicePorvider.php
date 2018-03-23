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

        View::composer(['school.menu.menu'], 'gkinder\Http\CounterView\CounterCircular');

        View::composer(['tutor.menu.menu'], 'gkinder\Http\CounterView\CounterCircular');
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
