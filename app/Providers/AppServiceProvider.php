<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Validator::extend('isnotset', function ($attribute, $value, $parameters, $validator) {
          $user = User::find($parameters[0]);
          if($attribute === 'password')
            return $user->password === null;
          else if($attribute === 'email')
            return $user->email === null;
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
