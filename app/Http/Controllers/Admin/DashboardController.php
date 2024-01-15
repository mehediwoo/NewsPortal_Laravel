<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\SubCategory;
use App\Models\post;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        $category = category::count();
        $post     = post::count();
        $subCate  = SubCategory::count();
        return view('admin.dashboard', compact('category','post','subCate'));
    }
}
