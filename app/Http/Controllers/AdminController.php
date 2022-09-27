<?php

namespace App\Http\Controllers;

Use Request,DB;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Article;
use App\Models\Product;
use App\Models\Transaction;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        return Inertia::render('Admin/Index',[
            'users' =>  User::orderBy('id','DESC')->paginate(5)->map(function($users){
                return [
                    'id' => $users->id,
                    'email' => $users->email,
                    'username' => $users->username
                ];
            }),
            'articles' =>  Article::orderBy('article_id','DESC')->paginate(5)->map(function($articles){
                return [
                    'id' => $articles->article_id,
                    'title' => $articles->article_title,
                    'slug' => $articles->article_slug
                ];
            }),
            'nfts' =>  Product::where('product_nft',1)->orderBy('product_id','DESC')->paginate(5)->map(function($nfts){
                return [
                    'id' => $nfts->product_id,
                    'title' => $nfts->product_name,
                    'slug' => $nfts->product_uniqid,
                ];
            })
            ,
            'transaction' =>  Transaction::orderBy('id','DESC')->paginate(5)->map(function($transaction){
                return [
                    'id' => $transaction->id,
                    'amount' => $transaction->amount,
                    'success' => $transaction->success,
                ];
            }) ,
            'feeds' =>  DB::table('feeds')->orderBy('feed_id','DESC')->paginate(5)->map(function($feeds){
                return [
                    'id' => $feeds->feed_id,
                    'title' => $feeds->feed_title,
                    'url' => $feeds->feed_url,
                ];
            }),
            'searches' =>  DB::table('searches')->orderBy('search_id','DESC')->paginate(5)->map(function($searches){
                return [
                    'id' => $searches->search_id,
                    'title' => $searches->search_query,
                    'view' => $searches->search_view,
                ];
            })
         ]);
    }
    public function adminaddnewfeed(){
        return Inertia::render('Admin/Feed/New',[
            'feeds' =>  DB::table('feeds')->orderBy('feed_id','DESC')->paginate(15)->map(function($feeds){
                return [
                    'id' => $feeds->feed_id,
                    'title' => $feeds->feed_title,
                    'url' => $feeds->feed_url,
                ];
            })
         ]);

    }
    public function adminaddnewfeedform(){
        $query = DB::table('feeds')->insert([
            'feed_title' => Request::input('title'),
            'feed_url' =>  Request::input('url'),
            'feed_category' =>  Request::input('category'),
            'feed_lang' =>  Request::input('lang'),
            "created_at" =>  \Carbon\Carbon::now(), 
        "updated_at" => \Carbon\Carbon::now() 
        ]);
        return redirect()->back();
    }
    public function admindeletefeed($id){
        DB::table('feeds')->where('feed_id', $id)->delete();
        return redirect()->back();
    }
}
