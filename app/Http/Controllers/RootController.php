<?php

namespace App\Http\Controllers;

use Request,Auth,Validator,Alert,Image,Helper,Str,Route,Carbon,Session,DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Article;
use App\Models\Notification;
use App\Models\Live;
use App\Models\Product;
use Stichoza\GoogleTranslate\GoogleTranslate;

class RootController extends Controller
{

    public function welcome(){

        // if(empty(str_contains(Request::url(), '127.0.0.1:8000')) &&  empty(str_contains(Request::url(), '127.0.0.1:8001')) &&  empty(str_contains(Request::url(), 'last.today'))){
        //     $domain = Request::url();

        //     $remove = array("http://", "https://", "wwww.");
        //     $clean_domain = str_replace($remove,null,$domain);
           
        //     $domain_finder = DB::table("users")->where('domain',$clean_domain)->first();

            
        //     $username = $domain_finder->username;
        //     Session::put('username', $username);

        //     $user = DB::table("users")->where('username',$username)->first();
        //     $results = DB::table("articles")->where('article_user_id',$user->id)->orderBy('article_id', "DESC")->paginate(5);
      
        //     if(isset($user)){
        //         $follow_checker = Helper::user_follow_unfollow_checker($username);
        //         return Inertia::render('LT/Profile',[
        //            'user' =>  $user,
        //            'follow_checker' => $follow_checker,
        //            'avatar' => '/storage/'.$user->profile_photo_path,
        //            'articles' =>  Article::where('article_user_id',$user->id)->orderBy('article_id', "DESC")->distinct()->paginate(30)->map(function($article){
        //                return [
        //                    'id' => $article->article_id,
        //                    'title' => $article->article_title,
        //                    'content' => $article->article_content,
        //                    'slug' => $article->article_slug,
        //                    'image' => Helper::file_checker($article->article_id,'blog')
        //                 ];
        //            })
        //         ]);
               
        //     }else{
        //         return redirect()->to('/')->with('message', 'We do not have such a user');

        //     }
        // }
        // else{

            // $get_total_views = DB::table('settings')->first();
            // $total_views = $get_total_views->settings_total_view;
            $dt = Carbon::now();
            $datetimestring = $dt->toDateTimeString();
         
               return Inertia::render('Welcome', [
                // 'first31post' =>  DB::table("articles")->orderBy('article_view', "DESC")->paginate(21)->map(function($first31post){
                //     return [
                //         'id' => $first31post->article_id,
                //         'title' => $first31post->article_title,
                //         'content' => Helper::limit_characters($first31post->article_content,150),
                //         'slug' => $first31post->article_slug,
                //         'time' => \Carbon\Carbon::parse($first31post->created_at)->diffForHumans(),
                //         'image' => Helper::file_checker($first31post->article_id,'blog'),
                //         'avatar' => Helper::find_avatar($first31post->article_user_id),
                //         'username' => Helper::find_user_info($first31post->article_user_id)->username,
                //         'job' => Helper::find_user_info($first31post->article_user_id)->job,
                //         'view' => Helper::article_view($first31post->article_id),
                //         'comment_count' => Helper::get_total_comment("$first31post->article_id",'Article'),
                //         'user_comment_avatar' => Helper::find_avatar_for_comment(),
                //     ];
                // }),
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
            'phpVersion' => PHP_VERSION,
            // 'total_views' => $total_views,
            'datetimestring' => $datetimestring,
            'hashtags' =>  DB::table('hashtags')->select('hashtag_title', DB::raw('COUNT(hashtag_title) as count'))
            ->groupBy('hashtag_title')
            ->whereDate('created_at',Carbon::now()->format('Y-m-d'))
            ->orderBy('count', 'DESC')
            ->paginate(30)->map(function($hashtags){
                return [
                  'name' => $hashtags->hashtag_title
               ];
            }),
            'topsearch' =>  DB::table('searches')->select('search_query', DB::raw('COUNT(search_query) as count'))
            ->groupBy('search_query')
            ->whereDate('created_at',Carbon::now()->format('Y-m-d'))
            ->inRandomOrder()->paginate(11)->map(function($topsearch){
                return [
                  'name' => $topsearch->search_query
               ];
            })
          
        ]);
        // }
       
     }
    public function menu(){
        if (Auth::user()){
            $username = Auth::user()->username;
            }else{
                $username =3;

            }
        return Inertia::render('LT/Menu',[
            'username' => $username
        ]);
    }
   public function users(){
    $userpaginate = User::orderBy('id','DESC')->paginate(30);
      return Inertia::render('LT/Users',[
        'userpaginate' => $userpaginate,
         'users' =>  User::orderBy('id','DESC')->paginate(30)->map(function($users){
             return [
               'id' => $users->id,
               'name' => $users->name,
               'username' => $users->username,
               'avatar' => Helper::find_avatar($users->id),
               'follow_checker' => Helper::user_follow_unfollow_checker("$users->username"),
            ];
         })
      ]);
   }
   

   public function showprofile($username){
      $user = User::where('username',$username)->first();
      if($user == null){
        // return redirect()->to('/')->with('message', 'We do not have such a user');
        return redirect()->to('/');
    }else{
         $follow_checker = Helper::user_follow_unfollow_checker("$username");
         $user_id_for_shop = Helper::find_user_by_username("$username")->id;
         $shop_checker_1 = DB::table('products')->where('product_owner_id',$user_id_for_shop)->first();

         if(!empty($shop_checker_1)){
            $shop_checker = 1;
         }else{
            $shop_checker = 0;
         }


         $articles2 = Article::where('article_user_id',$user->id)->orderBy('article_id','DESC')->paginate(30);

         
         if (Auth::user()){
            $add_new_articles = 1;
            }else{
                $add_new_articles = 0;

            }



         return Inertia::render('LT/Profile',[
            'add_new_articles' => $add_new_articles,
            'articles2' => $articles2,
            'shop_checker' => $shop_checker,
            'user' =>  $user,
            'follow_checker' => $follow_checker,
            'background_img' => "background-image: url('/".$user->backgroundimage."')",
            'avatar' => Helper::find_avatar($user->id),
            'articles' =>  Article::where('article_user_id',$user->id)->orderBy('article_id', "DESC")->distinct()->paginate(30)->map(function($article){
                return [
                    'id' => $article->article_id,
                    'title' => $article->article_title,
                    'content' => $article->article_content,
                    'slug' => $article->article_slug,
                    'image' => Helper::file_checker($article->article_id,'blog'),
                ];
            })
         ]);
      }
   }
   public function newarticle(){
      return Inertia::render('LT/NewArticle');
   }
   public function submit_article(){
      if (Auth::user()){
          $validator = Validator::make(Request::all(), [
              'content' => 'nullable|min:1|string',
              'attachfiles' => 'nullable','max:9999048',
              'attachfiles.*' => 'mimes:jpg,png,mp3,ogg,mp4,mov,jpeg,gif,pdf'
         ]);
      }else{
          $validator = Validator::make(Request::all(), [
              'content' => 'nullable|min:1|string',
              'attachfiles' => 'nullable','max:9048',
              'attachfiles.*' => 'mimes:jpg,png,mp3,ogg,mp4,mov,jpeg,gif,pdf'
         ]);
      }
      $errors = $validator->errors();
      foreach ($errors->all() as $message) {
          return redirect()->back()->with('message', "$message");
          die();
      }
      if(empty(Request::input('content')) && empty(Request::input('attachfiles'))){
        return redirect()->back()->with('message', "Error!,You can not post blank content");
      }
      if (Auth::user()){$user_id = Auth::user()->id;}else{$user_id = 3;}

      $title = Helper::limit_characters(Request::input('content'), 100);
      $slug = Helper::encryptit(uniqid());
      $data = Article::create([
          'article_title' => $title ,
          'article_content' => Request::input('content'),
          'article_slug'  => $slug,
          'article_user_id'  => $user_id,
          'article_lang'  => app()->getLocale(),
          'article_user_ip' => Helper::get_client_ip()
      ]);
      preg_match_all("/(#\w+)/", Request::input('content'), $matches);
      foreach($matches[0] as $matche){
          $replaced = str_replace('#',null, $matche);
          $query = DB::table('hashtags')->insert([
              'hashtag_title' => $replaced,
              'hashtag_post_id' => $data->id,
              "created_at" =>  \Carbon\Carbon::now(), 
          "updated_at" => \Carbon\Carbon::now() 
          ]);
      }
      if(Request::file('attachfiles') == null){
        $file_path = null;
       }else{
         
              foreach(Request::file('attachfiles') as $key => $files)
              {
                  $file_name = Helper::gen_uuid($len=16).md5(uniqid()) . '.' . $files->getClientOriginalExtension();
                  if(preg_match('/\.(jpg|png|jpeg)$/', $file_name)) {
                      $img = Image::make($files);
                      $img->resize(800, 800);
                      $img->save("files/images/".$file_name);
                      $file_path = "files/images/".$file_name;
                  }else{
                      $files->move('files/blogs', $file_name);
                      $file_path = 'files/blogs/'. $file_name;
  
                  }
                  DB::table('files')->insert([
                      'file_user_id' => $user_id,
                      'file_path' => $file_path,
                      'file_content_id' => $data->id,
                      'type' => 'blog'
                  ]);
              }
         
    }

    if(isset($data)){
        toast('Your content success added','success');
    }else{
        toast('Error,Try again !','error');
    }

      $url = url('/')."/app/articles/".$slug;
      return redirect()->to("$url");

  }
  public function show_articles(){

    $articles = Article::orderBy('article_id','DESC')->paginate(30);

    return Inertia::render('LT/Articles', [
    'articles' => $articles,
    'articles2' =>  Article::orderBy('article_id','DESC')->paginate(30)->map(function($articles2){
                    return [
                        'id' => $articles2->article_id,
                        'title' => $articles2->article_title,
                        'content' => Helper::limit_characters($articles2->article_content,150),
                        'slug' => $articles2->article_slug,
                        'time' => \Carbon\Carbon::parse($articles2->created_at)->diffForHumans(),
                        'image' => Helper::file_checker($articles2->article_id,'blog'),
                        'avatar' => Helper::find_avatar($articles2->article_user_id),
                        'username' => Helper::find_user_info($articles2->article_user_id)->username,
                        'view' => Helper::article_view($articles2->article_id),
                        'comment_count' => Helper::get_total_comment("$articles2->article_id",'Article'),
                        'user_comment_avatar' => Helper::find_avatar_for_comment(),
                    ];
                }),

    ]);

  }
  public function view_articlex($slug){
    $url = "/app/articles/".$slug;
    return redirect()->to("$url");
  }
  public function view_article($slug){
   $article = Article::where('article_slug',$slug)->first();
   if(isset($article)){
    if (Auth::user()){
        if (Auth::user()->id == $article->article_user_id){
            $button1 = "1";
            $button2 = "1";
            $button3 = "1";
        }else{
            $button1 = "0";
            $button2 = "0";
            $button3 = "0";
        }
        }else{
        $button1 = "0";
        $button2 = "0";
        $button3 = "0";
        }
       $likecout = Helper::reaction_number_content($article->article_id,'like');
       $dislikecout = Helper::reaction_number_content($article->article_id,'dislike');
       $cryingcout = Helper::reaction_number_content($article->article_id,'crying');
       $hotcout = Helper::reaction_number_content($article->article_id,'hot');
       $lovecout = Helper::reaction_number_content($article->article_id,'love');
       $angrycout = Helper::reaction_number_content($article->article_id,'angry');
       $tiredcout = Helper::reaction_number_content($article->article_id,'tired');
       $vomitingcout = Helper::reaction_number_content($article->article_id,'vomiting');
       $poop = Helper::reaction_number_content($article->article_id,'poop');
       $boring = Helper::reaction_number_content($article->article_id,'boring');
       $lol = Helper::reaction_number_content($article->article_id,'lol');
       $wink = Helper::reaction_number_content($article->article_id,'wink');
       $inlove = Helper::reaction_number_content($article->article_id,'inlove');
       $makehashtagpost = preg_match_all("/(#\w+)/", $article->article_content, $matches);
       $showhashtagpost = Str::replace('#','', $matches[0]);
       $article_1image = Helper::file_checker($article->article_id,'blog');
    //    $article_files = asset(Helper::files_checker(13,'blog'));
       $userpaginate = User::orderBy('id','DESC')->paginate(30);
        $new_avatar = Helper::find_avatar($article->article_user_id);



       return Inertia::render('LT/ArticleView',[
        'id' => $article->article_id,
        'article_url' => url('/')."/app/articles/".$article->article_slug,
        'user_article_url' => url('/')."/".Helper::find_user_info($article->article_user_id)->username,
        'user_username' => Helper::find_user_info($article->article_user_id)->username,
        'user_article_support_money' => "https://bank.last.today"."/".Helper::find_user_info($article->article_user_id)->username."/pay/10",
           'avatar' =>  Helper::find_avatar($article->article_user_id),
           'article_view' => Helper::article_view($article->article_id),
           'time' =>  \Carbon\Carbon::parse($article->created_at)->diffForHumans(),
           'article' =>  $article,
           'poop' => $poop,
           'lol' => $lol,
           'inlove' => $inlove,
           'wink' => $wink,
           'boring' => $boring,
           'likecout' => $likecout,
           'dislikecout' => $dislikecout,
           'cryingcout' => $cryingcout,
           'hotcout' => $hotcout,
           'lovecout' => $lovecout,
           'angrycout' => $angrycout,
           'tiredcout' => $tiredcout,
           'vomitingcout' => $vomitingcout,
           'showhashtagpost' => $showhashtagpost,
           'button1' => $button1,
           'button2' => $button2,
           'button3' => $button3,
           'getcomments' =>  DB::table('comments')->where('comment_anything_id',$article->article_id)->where('comment_anything_type','Article')->orderBy('comment_id','DESC')->paginate(10)->map(function($getcomments){
            return [
                'c_id' => $getcomments->comment_id,
                'c_content' => $getcomments->comment_body,
                'c_uiun' => Helper::find_user_info($getcomments->comment_user_id)->username,
                'c_avatar' => 'storage/'.Helper::find_user_info($getcomments->comment_user_id)->profile_photo_path,
                'c_time' => \Carbon\Carbon::parse($getcomments->created_at)->diffForHumans()
            ];
        }),
        'getfiles' =>   Helper::files_checker($article->article_id,'blog')->map(function($getfiles){
            return [
                'f_id' => $getfiles->file_id,
                'f_path' => Helper::make_thumbnails($getfiles->file_path),
                // 'f_path' => asset($getfiles->file_path) 
         ];
        }),
        'lastarticles' =>  Article::orderBy('article_id','DESC')->paginate(10)->map(function($lastarticles){
            return [
                'id' => $lastarticles->article_id,
                'title' => $lastarticles->article_title,
                'content' => Helper::limit_characters($lastarticles->article_content,150),
                'slug' => $lastarticles->article_slug,
                'username' => Helper::find_avatar($lastarticles->article_user_id),
                'image' => Helper::file_checker($lastarticles->article_id,'blog')
            ];
        }),
        'users' =>  User::inRandomOrder()->paginate(55)->map(function($users){
            return [
              'id' => $users->id,
              'name' => $users->name,
              'username' => $users->username,
              'avatar' => Helper::find_avatar($users->id),
              'follow_checker' => Helper::user_follow_unfollow_checker("$users->username"),
           ];
        })
        ]);
   }
   else{
    return redirect()->to("/")->with('message', '404 !');
   }
   
   }
   public function showhashtagcontent($name){
    $follow_checker = Helper::hashtag_follow_unfollow_checker($name);
    $articles = DB::table('articles')->join('hashtags', 'articles.article_id', '=', 'hashtags.hashtag_post_id')->where('article_title', 'like', '%' . $name . '%')->orWhere('article_content', 'like', '%' . $name . '%')->orderBy('article_id', "DESC")->distinct()->paginate(30);

    return Inertia::render('LT/Hashtags',[
        'name' => $name,
        'articles' => $articles,
        'follow_checker' => $follow_checker,
          'articles2' =>  DB::table('articles')->join('hashtags', 'articles.article_id', '=', 'hashtags.hashtag_post_id')->where('article_title', 'like', '%' . $name . '%')->orWhere('article_content', 'like', '%' . $name . '%')->orderBy('article_id', "DESC")->distinct()->paginate(30)->map(function($articles2){
           return [
            'id' => $articles2->article_id,
            'title' => $articles2->article_title,
            'content' => Helper::limit_characters($articles2->article_content,150),
            'slug' => $articles2->article_slug,
            'username' => Helper::find_user_info($articles2->article_user_id)->username,
            'image' => Helper::file_checker($articles2->article_id,'blog')
        ];
       })
    ]);
   }
   public function notifications(){
      $notifications1 = Notification::orderBy('notification_id','DESC')->paginate(30);
      return Inertia::render('LT/Notifications',[
        'notifications1' => $notifications1,
         'notifications2' =>  Notification::orderBy('notification_id','DESC')->paginate(30)->map(function($notifications2){
             return [
               'id' => $notifications2->notification_id,
               'sender' => Helper::find_user_info($notifications2->notification_sender_id)->username,
               'sender_avatar' => Helper::find_avatar($notifications2->notification_sender_id),
               'reciver' => Helper::find_user_info($notifications2->notification_reciver_id)->username,
               'evid' => Helper::encryptit($notifications2->notification_everything_id),
               'evtype' => $notifications2->notification_everything_type,
               'msg' => $notifications2->notification_message,
               'time' => \Carbon\Carbon::parse($notifications2->created_at)->diffForHumans(),

             ];
         })
      ]);
   }
   public function music(){
    return Inertia::render('LT/Music');
   }
   public function worldometers(){
    return Inertia::render('LT/WorldoMeters');
   }
   public function youtubelives(){
      return Inertia::render('LT/YoutubeLives',[
         'lives' =>  Live::orderBy('live_id','DESC')->get()->map(function($lives){
             return [
               'id' => $lives->live_id,
               'title' => $lives->live_title,
               'content' => $lives->live_content,
               'image' => asset($lives->live_image)
             ];
         })
      ]);
   }
   public function youtubelivesview($id){
      $live = Live::where('live_id',$id)->first();
      $url =  url('/').'/app/lives/'.$live->live_id.'/view';

      return Inertia::render('LT/YoutubeLivesView',[
        'url' => $url,
        'live' =>  $live,
        'image' => asset($live->live_image)
       ]);
   }
   public function nftmarketplace(){
     $productsx = Product::where('product_nft',1)->orderBy('product_id','DESC')->get();
      return Inertia::render('LT/NFTMarketPlace',[
         'articles' =>  $productsx->map(function($articles){
             return [
               'id' => $articles->product_id,
               'title' => $articles->product_name,
               'price' => $articles->product_price,
               'slug' => $articles->product_uniqid,
               'ownerid' => $articles->owner_id,
               'productuserid' => $articles->product_user_id,
                'image' => Helper::file_checker($articles->product_id,'nft')
             ];
         })
      ]); 
    // $productsx = Product::where('product_nft',1)->orderBy('product_id','DESC')->get();
    //   return Inertia::render('LT/NFTMarketPlace',[
    //      'products' =>  $productsx->map(function($products){
    //          return [
    //            'id' => $products->product_id,
    //            'title' => $products->product_name,
    //            'price' => $products->product_price,
    //            'slug' => $products->product_slug,
    //            'ownerid' => $products->owner_id,
    //            'productuserid' => $products->product_user_id,
    //             'image' => asset($products->product_image)
    //          ];
    //      })
    //   ]); 
    }
    public function view_nft($slug){
        $product = Product::where('product_uniqid',$slug)->first();
        return Inertia::render('LT/NFTView',[
            'product' => $product,
            'creator' => Helper::find_user_info($product->product_user_id)->username,
            'owner' => Helper::find_user_info($product->product_owner_id)->username,
            'getfiles' =>   Helper::files_checker($product->product_id,'nft')->map(function($getfiles){
                return [
                    'f_id' => $getfiles->file_id,
                    'f_path' => $getfiles->file_path
             ];
            }),
         ]);
    }
    public function view_user_shop($username){

        $user_id_for_shop = Helper::find_user_by_username("$username")->id;
        $products = Product::orderBy('product_id','DESC')->where('product_user_id',$user_id_for_shop)->where('product_nft',0)->paginate(30);
        return Inertia::render('LT/User/Auth/Products', [
        'products' => $products,
        'products2' =>  Product::orderBy('product_id','DESC')->where('product_user_id',$user_id_for_shop)->where('product_nft',0)->paginate(30)->map(function($products2){
            return [
                'id' => $products2->product_id,
                'title' => $products2->product_name,
                'content' => $products2->product_description,
                'price' => $products2->product_price,
                'slug' => $products2->product_uniqid,
                'username' => Helper::find_user_info($products2->product_owner_id)->username,
                'image' => asset(Helper::file_checker($products2->product_id,'shop'))
            ];
        })
        ]);
    }
    public function view_product($slug){

        $product = Product::where('product_uniqid',$slug)->first();
        if (Auth::user()){
            $action_button = 1;
            }else{
            $action_button = 0;
        }


        $purl = url('/')."/app/products/".$product->product_uniqid;
       
        return Inertia::render('LT/ProductView',[
            'purl' => $purl,
            'action_button' => $action_button,
            'x_slug' => $product->product_slug,
            'product' => $product,
            'creator' => Helper::find_user_info($product->product_user_id)->username,
            'owner' => Helper::find_user_info($product->product_owner_id)->username,
            'products2' =>  Product::orderBy('product_id','DESC')->paginate(10)->map(function($products2){
                return [
                    'id' => $products2->product_id,
                    'title' => $products2->product_name,
                    'content' => $products2->product_description,
                    'price' => $products2->product_price,
                    'slug' => $products2->product_uniqid,
                    'username' => Helper::find_user_info($products2->product_owner_id)->username,
                    'image' => asset(Helper::file_checker($products2->product_id,'shop'))
                ];
            }),
            'getfiles' =>   Helper::files_checker($product->product_id,'shop')->map(function($getfiles){
                return [
                    'f_id' => $getfiles->file_id,
                    'f_path' => asset($getfiles->file_path) 
             ];
            }),
         ]);
    }

    public function googletranslate($any){
        $tr = new GoogleTranslate('en', null);
        echo $tr->translate("$any");
    }

    public function userreports($username){
        
        $user_id = Helper::find_user_by_username($username)->id;
        $reports = DB::table("reports")->where('report_reported_user_id',$user_id)->paginate(20);
      
        return Inertia::render('LT/User/Reports',[
            'reports' => $reports,
         ]);
    }
    public function reportview($username,$code){
         $report_id = decrypt($code);
         $report = DB::table("reports")->where('report_id',$report_id)->first();
         $report_conversations = DB::table('reports_conversations')->where('report_c_report_id',$report_id)->paginate(10);
         return view('lt.user.report',compact(['report']));

    }

    public function tophashtags(){
        return Inertia::render('LT/HashtagsFollow',[
            'hashtags' =>  DB::table('hashtags')->select('hashtag_title', DB::raw('COUNT(hashtag_title) as count'))
            ->groupBy('hashtag_title')->orderBy('count', 'DESC')->paginate(201)->map(function($hashtags){
                return [
                  'name' => $hashtags->hashtag_title,
                  'follow_checker' => Helper::hashtag_follow_unfollow_checker("$hashtags->hashtag_title")
               ];
            }),
        ]); 
    }
    public function close(){
        return redirect()->to('/');

    }
    public function setting(){
        return Inertia::render('LT/Setting'); 
    }
   

    public function newreshare(){
    return redirect()->to('/')->with('message', "Coming Soon");
    }
  
    



  
}
