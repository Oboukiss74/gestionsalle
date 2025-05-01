<?php

namespace App\Providers;

use App\Models\Demandes;
use App\Models\Salles;
use App\Models\User;
use App\Policies\DemandesPolicy;
use App\Policies\SallesPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    protected $policies = [
        Demandes::class => DemandesPolicy::class,
        Salles::class => SallesPolicy::class,
        User::class => UserPolicy::class,
    ];

}
