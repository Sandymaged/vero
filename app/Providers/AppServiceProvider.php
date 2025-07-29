<?php

namespace App\Providers;

use App\Bindings\AdminBinding;
use App\Bindings\CategoryBinding;
use App\Bindings\CityBinding;
use App\Bindings\MerchantBinding;
use App\Bindings\MerchantBranchBinding;
use App\Bindings\MerchantUserBinding;
use App\Bindings\OfferBinding;
use App\Bindings\PermissionBinding;
use App\Bindings\RoleBinding;
use App\Bindings\ServiceBinding;
use App\Bindings\StateBinding;
use App\Bindings\SubcategoryBinding;
use App\Bindings\UserBinding;
use App\Domain;
use App\Domain\UseCases;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // bindings
        StateBinding::bind();
        UserBinding::bind();
        MerchantBranchBinding::bind();
        MerchantUserBinding::bind();
        MerchantBinding::bind();
        CategoryBinding::bind();
        OfferBinding::bind();
        CityBinding::bind();
        AdminBinding::bind();
        RoleBinding::bind();
        PermissionBinding::bind();
        ServiceBinding::bind();
        SubcategoryBinding::bind();

        Relation::morphMap([
            'user' => 'App\Models\User',
            'admin' => 'App\Models\Admin',
            'offer' => 'App\Models\Offer',
            'state' => 'App\Models\State',
            'city' => 'App\Models\City',
            'category' => 'App\Models\Category',
            'merchant' => 'App\Models\Merchant',
            'merchant_user' => 'App\Models\MerchantUser',
            'merchant_branch' => 'App\Models\MerchantBranch',
            'service' => 'App\Models\Service',
            'subcategory' => 'App\Models\Subcategory',
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
