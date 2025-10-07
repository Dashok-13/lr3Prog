<?php

namespace App\Providers;

use App\Models\Card;
use App\Models\Category;
use App\Models\UserCardProgress;
use App\Policies\CardPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\UserCardProgressPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Card::class => CardPolicy::class,
        Category::class => CategoryPolicy::class,
        UserCardProgress::class => UserCardProgressPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}