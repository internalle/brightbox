<?php

namespace BB\Providers;

use BB\Modules\Roles\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

use Auth;

class ViewComposerServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('panel.*', function (View $view) {

            $view->with('company', $this->getUserCompany());

        });

        view()->composer(['panel.users.edit','panel.users.create'], function (View $view) {

            $view->with('roles', $this->getUserRoles());
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function getUserCompany(){

        return  \Auth::user()->company;
    }

    private function getUserRoles(){

        return Role::pluck('name','id');
    }


}