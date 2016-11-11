<?php


namespace Softwaretours\Site\Repositories\Page;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Softwaretours\Site\Repositories\Page\PageInterface', 'Softwaretours\Site\Repositories\Page\PageRepository');
    }
}