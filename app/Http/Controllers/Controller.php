<?php

namespace App\Http\Controllers;

use App\Models\ArticleContent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $blogs = ArticleContent::with('categories')
            ->orderByDesc('created_at')->limit(5)->get();

        View::share('recent_blog_footers', $blogs);

        $page_settings = Setting::first();
        View::share('page_settings', $page_settings);

    }
}
