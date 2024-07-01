<?php

namespace App\Http\Middleware;

use Closure;
use View;
use DB;
use App\Category;
use App\SiteInformation;
use App\InsideCategory;

class webMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        // Category Name /
        $categories = Category::where('parent_id',0)->get(); 
        View::share('categories', $categories);

        $inside_cate = InsideCategory::all(); 
        View::share('inside_cate', $inside_cate);
        
        /* Site Code */
        $site = SiteInformation::all(); 
        View::share('site', $site);
        
        return $next($request);
    }
}
