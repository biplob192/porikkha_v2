<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\BaseRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        // Bind multiple classes
        // $this->app->bind([
        //     BaseRepositoryInterface::class => BaseRepository::class,
        //     UserRepositoryInterface::class => UserRepository::class
        // ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
