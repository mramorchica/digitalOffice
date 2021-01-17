<?php

namespace Mdo\JitsiEvent;

use Illuminate\Support\ServiceProvider;

class JitsiEventServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'JitsiEvent');
    }
}
