<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Subcategory;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubcateSlug
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $urlArr1 = Category::select("slug")->where('status', 1)->get()->toArray();
        $urlArr2 = Subcategory::select("slug")->where('status', 1)->get()->toArray();
        // Services no longer use slugs (slug column was removed)
        $urlArr4 = ['admin', 'login', 'logout', 'dashboard', 'setting', 'banner', 'project-slider', 'category', 'subcategory', 'service', 'blog', 'users', 'roles', 'permission'];
        $urlArr = array_merge($urlArr1, $urlArr2, $urlArr4);
        if (in_array($request->route('subcateSlug'), $urlArr)) {
            return $next($request);
        }

        return abort(404);
    }
}
