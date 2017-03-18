<?php

namespace BB\Providers;

use BB\Core\Database\Model;
use BB\Modules\Companies\Company;
use BB\Modules\Companies\CompanyObserver;
use BB\Modules\Users\UserController;
use BB\Modules\Users\UsersRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use BB\Modules\Users\User;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);



    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
