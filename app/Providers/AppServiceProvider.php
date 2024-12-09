<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 
        // esto corrije el error 
        //      max key length is 1000 bytes (Connection: mariadb, SQL: create table `password_reset_tokens` 
        //      (`email` varchar(255) not null, `token` varchar(255) not null, `created_at` timestamp null, 
        //      primary key (`email`)) default character set utf8mb4 collate 'utf8mb4_unicode_ci')
        Schema::defaultStringLength(191);
    }
}
