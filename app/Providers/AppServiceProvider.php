<?php

namespace App\Providers;

use App\Models\ArticleContent;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $blogs = ArticleContent::with('categories')
            ->orderByDesc('created_at')->limit(5)->get();

        View::share('recent_blog_footers', $blogs);
    }
}
