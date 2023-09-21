<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Models\ArticleContent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $articles = ArticleContent::with('categories')
            ->orderBy('created_at', 'desc')
            ->paginate(2);

        $recentArticles = ArticleContent::with('categories')
            ->orderByDesc('created_at')->limit(5)->get();

        $categories = ArticleCategory::all();

        if ($request->ajax()) {
            $view = view('content.customers.blogs._partials.items', compact('articles'))->render();

            return response()->json(['html' => $view]);
        }

        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customers.blogs.index', ['pageConfigs' => $pageConfigs], compact('articles', 'recentArticles', 'categories'));
    }

    public function show(Request $request, $slug)
    {
        $article = ArticleContent::with('categories')->where('slug', $slug)->first();
        if (!$article) {
            return response(null, Response::HTTP_NOT_FOUND);
        }

        $recentArticles = ArticleContent::with('categories')
            ->orderByDesc('created_at')->limit(5)->get();

        $categories = ArticleCategory::all();

        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customers.blogs.show', ['pageConfigs' => $pageConfigs], compact('article', 'recentArticles', 'categories'));
    }
}
