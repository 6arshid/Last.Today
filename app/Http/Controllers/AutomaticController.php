<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Vedmant\FeedReader\Facades\FeedReader;
use App\Models\User;
use App\Models\Setting;
use App\Models\Article;
use Helper;
use Image;
use Carbon;
use Auth;

class AutomaticController extends Controller
{
    public function feedreader($id){
        $feed_info = DB::table("feeds")->where('feed_id',$id)->first();
        
        $rss = FeedReader::read("$feed_info->feed_url");
        
        foreach ($rss->get_items(0, 20) as $item) {  //loop through each item
      
           $link = $item->get_permalink();

           $url_checker = Helper::feed_search($link);
           if($url_checker == null){
            $title = $item->get_title();
            $content = $item->get_content()."<br> #".$feed_info->feed_category."<br><a href='".$link."' target='_blank'>Read More</a>";
 
            $slug1 = encrypt(uniqid());

 
         //    $query = DB::table('articles')->insert([
         //     'article_type' => 'feed',
         //     'article_title' => $title,
         //     'article_content' => $content,
         //     'article_user_id' => 3,
         //     'article_slug' => mb_strimwidth("$slug1", 0, 99, null)
         // ]);
             $data = new Article;
             $data->article_type = 'feed';
             $data->article_title = $title;
             $data->article_content = $content;
             $data->article_user_id =  3 ;
             $data->article_feedurl =  $link  ;
             $data->article_slug = mb_strimwidth("$slug1", 0, 99, null);
             $data->save();
             preg_match_all("/(#\w+)/", $content, $matches);
             foreach($matches[0] as $matche){
                 $replaced = str_replace('#',null, $matche);
                 $query = DB::table('hashtags')->insert([
                     'hashtag_title' => $replaced,
                     'hashtag_post_id' => $data->id,
                     "created_at" =>  \Carbon\Carbon::now(), 
                 "updated_at" => \Carbon\Carbon::now() 
                 ]);
             }
            
 
             $image_url =  Helper::get_image_thumbnail($link);
             $file_name = Helper::gen_uuid($len=16).md5(uniqid()). ".jpg";
             $img = Image::make($image_url);
             $img->resize(800, 800);
             $img->save("files/images/".$file_name);
             $file_path = "files/images/".$file_name;
       
             $query = DB::table('files')->insert([
                 'file_user_id' => 3,
                 'file_path' => $file_path,
                 'file_content_id' => $data->id,
                 'type' => 'blog'
             ]);
           }

        

        

        }
    }
    public function gtrend(){
        $rss = FeedReader::read("https://trends.google.com/trends/hottrends/atom/hourly");
        foreach ($rss->get_items(0, 20) as $item) {  //loop through each item
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::last_keyword($keyword);
            // foreach ((array) $kmaker as $itexm) {
            //     echo $itexm."<br>";
            //     }

          $checker = DB::table('searches')->where('search_query', 'like', '%' . $keyword . '%')->first();
          if($checker == null){
            $query = DB::table('searches')->insert([
              'search_query' => $keyword,
              "created_at" =>  \Carbon\Carbon::now(), 
            "updated_at" => \Carbon\Carbon::now()
            ]);
            
      
          }
          else{
            $checker = DB::table('searches')->where('search_query', 'like', '%' . $keyword . '%')->first();
            $query = DB::table('searches')->where('search_query', 'like', '%' . $keyword . '%')->update(array('search_view' =>$checker->search_view += 1,'updated_at' => \Carbon\Carbon::now()));
          }


        }
            
    }
}
