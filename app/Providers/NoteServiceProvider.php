<?php

namespace App\Providers;

use App\Note;
use Illuminate\Support\ServiceProvider;

class NoteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Note::class,function(){return new Note();});
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
