<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageC extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function showreportmessage($any){
        
        echo Helper::decryptit($any);
        return Inertia::render('Messages/Report');

        // return Inertia::render('LT/HashtagsFollow',[
        //     'hashtags' =>  DB::table('hashtags')->select('hashtag_title', DB::raw('COUNT(hashtag_title) as count'))
        //     ->groupBy('hashtag_title')->orderBy('count', 'DESC')->paginate(201)->map(function($hashtags){
        //         return [
        //           'name' => $hashtags->hashtag_title,
        //           'follow_checker' => Helper::hashtag_follow_unfollow_checker("$hashtags->hashtag_title")
        //        ];
        //     }),
        // ]);
    }
    public function report_problem(){
            return Inertia::render('Messages/Report');
    }
}
