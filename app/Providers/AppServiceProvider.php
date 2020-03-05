<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MyClasses\MyService;
use App\MyClassex\PowerMyService;

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
      // app()->singleton('App\MyClasses\MyService', function($app) {
      //   $myservice = new MyService();
      //   $myservice->setId(0);
      //   return $myservice;
      // });
      // app()->when('App\MyClasses\MyService')
      //      ->needs('$id')
      //      ->give(1);
      // app()->bind('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');
      app()->resolving(function($obj, $app) {
        if (is_object($obj)) {
          echo get_class($obj) . '<br>';
        } else {
          echo $obj . '<br>';
        }
      });

      app()->resolving(PowerMyService::class, function($obj, $app) {
        $newData = ['ハンバーグ', 'カレー', '唐揚げ', '餃子'];
        $obj->setData($newData);
        $obj->setId(rand(0, count($newData)));
      });

      app()->singleton('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');
    }
}
