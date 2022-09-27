<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SiteMapController extends Controller
{
    public function index(){
        return view('sitemaps.index');
    }
    public function users(){
        $users = DB::table('users')->orderBy('id','DESC')->paginate(999);
        $my_url = "@";
        return response()->view('sitemaps.users', [
            'users' => $users,
            'my_url' => $my_url
        ])->header('Content-Type', 'text/xml');
        // return view('sitemaps.users',compact(['users','my_url']));
    }
    public function articles(){
        $articles = DB::table('articles')->orderBy('article_id','DESC')->paginate(999);
        return response()->view('sitemaps.articles', [
            'articles' => $articles
        ])->header('Content-Type', 'text/xml');
        // return view('sitemaps.articles',compact(['articles']));
    }
    public function searchs(){
        $searchs = DB::table('searches')->orderBy('search_id','DESC')->paginate(999);
        return response()->view('sitemaps.searchs', [
            'searchs' => $searchs
        ])->header('Content-Type', 'text/xml');
    }

}
