<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Service;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:admin-dashboard', ['only' => ['index']]);
    }


    public function index()
    {
        $categoryCounts = Category::count();
        $subcategoryCounts = Subcategory::count();
        $serviceCounts = Service::count();
        $blogCounts = Blog::count();
        return view('admin.dashboard.index', compact(['categoryCounts', 'subcategoryCounts', 'serviceCounts', 'blogCounts']));
    }


    public function generate()
    {
        $appurl = env('APP_URL');
        $sitemap = SitemapGenerator::create($appurl);
       
        $sitemap->writeToFile(public_path('sitemap.xml'));

        return 'Sitemap generated successfully!';
    }
}