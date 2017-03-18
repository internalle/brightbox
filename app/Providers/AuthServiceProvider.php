<?php

namespace BB\Providers;

use BB\Modules\Companies\Company;
use BB\Modules\Products\Product;
use BB\Modules\Users\User ;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class  => 'BB\Policies\UserPolicy',
        Product::class  => 'BB\Policies\ProductPolicy',
        Company::class  => 'BB\Policies\CompanyPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('Admin', function ($user) {

            return $user->isAdmin();
        });

        Gate::define('ManagerOrAdmin', function ($user) {

            return $user->isAdminOrManager();
        });

        Gate::define('Applicant', function ($user) {

            return $user->isApplicant();
        });
    }
}
