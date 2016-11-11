<?php

namespace Softwaretours\Site\Providers;
//var_dump(dirname(__DIR__)."../Classes/curlWrap_v1.php"); exit();
include(__DIR__."/../Classes/curlWrap_v1.php");
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;


class SiteServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {

        //$this->registerTranslations();
        //$this->registerConfig();
        $this->registerViews();

        view()->composer(['package::layouts.master'], function ($view) {
            
            $user_id = env('ACCOUNT_ID');
            
            
            /* $old_providers = Config::get('app.providers');
            array_push($old_providers, \Softwaretours\Site\Repositories\Page\BackendServiceProvider::class);
            Config::set('app.providers', $old_providers);
            var_dump(Config::get('app.providers')); */
            
            /**
             * Get top menu
             */
            $menuData['user_id'] = $user_id;
            $menu = curlWrap('get-menu', $menuData, "POST", null);
            $menu = json_decode($menu, true); 
            $menu = $menu['menu'];
            
            
            /**
             * Get footer menu (default) - not used if page has it's own custom footer
             */
            $footerData['user_id'] = $user_id;
            $footerArray = curlWrap('get-footer', $footerData, 'POST', null);
            $footerArray = json_decode($footerArray, true);
            

            /**
             *  User settings
             */
            $userData['user_id'] = $user_id;
            $user = curlWrap('user-settings', $userData, "POST", null);
            $user = json_decode( $user, true);
			$user = $user['settings'];
            
            /**
             * Generate user css file
             */

            $user_css = "";
            $user_css = curlWrap('make-css', array('user_id' => $user_id), "POST", null);
            
            if (!file_exists(public_path().'/usercss')) {
            	mkdir(public_path().'/usercss', 0777, true);
            }
            file_put_contents(public_path() . "/usercss/user-$user_id.css", $user_css);
            /**
             *  Get google font
             */
            $result = curlWrap('get-google-font', array('user_id' => $user_id), "POST", null);
            $result = json_decode($result, true);
           
            $result_settings = $result['settings'];
            $google_font = $result_settings['url'];
            
            $view->with(compact('menu', 'user', 'user_css', 'google_font', 'user_id', 'footerArray'));
            
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    	App::register('Softwaretours\Site\Repositories\Page\BackendServiceProvider');
    	include __DIR__.'/../Http/routes.php';
    	$this->app->make('Softwaretours\Site\Http\Controllers\PageController');
    	
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('site.php'),
        ]);
        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'site');
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
    	$this->loadViewsFrom((__DIR__).'/../Resources/views', 'package');
    	
        /* $viewPath = base_path('resources/views/modules/site');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/site';
        }, \Config::get('view.paths')), [$sourcePath]), 'site'); */
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/site');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'site');
        }
        else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'site');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
