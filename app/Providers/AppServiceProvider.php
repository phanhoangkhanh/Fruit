<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Livewire\Component;
use App\Http\Livewire\RegisterModal;
use App\Http\Livewire\DeclareCustomer;
use App\Http\Livewire\ListCustomer;
use App\Http\Livewire\DeclareFruit;
use App\Http\Livewire\ListFruitItem;
use App\Http\Livewire\InvoiceAll;
use App\Http\Livewire\InvoiceUpdate;
use App\Http\Controllers\Helper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(): void
    {
        //
        $this->app->singleton(Helper::class, function (Application $app) {
            return new Helper;
        });
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Livewire::component("register-modal", RegisterModal::class);
        // customer
        Livewire::component("declare-customer", DeclareCustomer::class);
        Livewire::component("list-customer", ListCustomer::class);
        // fruit
        Livewire::component("declare-fruit", DeclareFruit::class);
        Livewire::component("list-fruit-item", ListFruitItem::class);
        // provider
        Livewire::component("invoice-all", InvoiceAll::class);
        Livewire::component("invoice-update-create", InvoiceUpdate::class);
    }
}
