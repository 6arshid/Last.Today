<?php

namespace App\Http\Controllers;

use Request,Auth,Validator,Alert,Image,Helper,File,Carbon;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Article;
use App\Models\Note;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function youserchecker(){


        $follow_checker = DB::table('follows')->where('follower',Auth::user()->id)->first();
        if($follow_checker){
            return redirect()->to('/user/dashboard');
        }else{
            $msg = "You are not following any hashtags. Please follow one or more hashtags to be aware of the latest updates of that hashtag.";
            return Inertia::render('LT/Auth/YouserChecker',[
                'msg' => $msg,
                'user_info' =>  User::where('id',Auth::user()->id)->first()
             ]);

        }  
    }
    public function mydashboard(){
        return Inertia::render('Dashboard',[
            'user_info' =>  User::where('id',Auth::user()->id)->first()
         ]);
    }
    public function changepassword(){
        return Inertia::render('Profile/Password');
    }
    public  function LogoutOtherBrowserSessionsForm(){
        return Inertia::render('Profile/BrowserSessions');
    }
    public  function TwoFactorAuthenticationForm(){
        return Inertia::render('Profile/TwoFactorAuthenticationForm');
    }
    public  function DeleteUserForm(){
        return Inertia::render('Profile/DeleteUserForm');
    }
    public function settingindex(){
        return Inertia::render('LT/User/Auth/SettingIndex',[
            'user_info' =>  User::where('id',Auth::user())->first()
         ]);
    }
    public function edit_article($slug){
        
        $article = Article::where('article_slug',$slug)->where('article_user_id',Auth::user()->id)->first();
        if(isset($article)){
            return Inertia::render('LT/User/Auth/ArticleEdit',[
                'article' =>  $article,
                'image' =>  asset(Helper::file_checker($article->article_id,'blog')),
                'getfiles' =>   Helper::files_checker($article->article_id,'blog')->map(function($getfiles){
                    return [
                        'f_id' => $getfiles->file_id,
                        'f_path' => asset($getfiles->file_path) 
                 ];
                })
             ]);
        }else{
            return redirect()->to('/')->with('message', 'You not owner for this post');
        }
       
    }
    public function submiteditform_article($slug){
        $article = Article::where('article_slug',$slug)->where('article_user_id',Auth::user()->id)->first();
   
        if(isset($article)){

              if(Request::file('image')){
                $old_files = DB::table('files')->where('file_content_id',$article->article_id)->where('type','blog')->get();
                foreach($old_files as $old_files_row){
                    File::delete(public_path("$old_files_row->file_path"));
                    DB::table('files')->where('file_content_id',$article->article_id)->where('type','blog')->delete();

                }
                foreach(Request::file('image') as $key => $files)
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
                        'file_user_id' => Auth::user()->id,
                        'file_path' => $file_path,
                        'file_content_id' => $article->article_id,
                        'type' => 'blog'
                    ]);
                }
            }
            preg_match_all("/(#\w+)/", Request::input('content'), $matches);
            foreach($matches[0] as $matche){
                $replaced = str_replace('#',null, $matche);
                $query = DB::table('hashtags')->insert([
                    'hashtag_title' => $replaced,
                    'hashtag_post_id' => $article->article_id,
                    "created_at" =>  \Carbon\Carbon::now(), 
                "updated_at" => \Carbon\Carbon::now() 
                ]);
            }

            $title = Helper::limit_characters(Request::input('content'), 100);

            DB::table('articles')->where('article_slug',$slug)->where('article_user_id',Auth::user()->id)->update(array(
                'article_title' =>  $title,
                'article_content' =>  Request::input('content'),
                'article_lang' =>  Request::input('lang'),
                'updated_at' => \Carbon\Carbon::now()
            ));

       

            $url = url('/')."/app/articles/".$slug;
            return redirect()->to("$url");
        }else{
            return redirect()->to('/')->with('message', 'You not owner for this post');
        }
    }
    public function delete_article($slug){

        $article = Article::where('article_slug',$slug)->where('article_user_id',Auth::user()->id)->first();
        $old_files = DB::table('files')->where('file_content_id',$article->article_id)->where('type','blog')->get();
        foreach($old_files as $old_files_row){
            File::delete(public_path("$old_files_row->file_path"));
            DB::table('files')->where('file_content_id',$article->article_id)->where('type','blog')->delete();
        }
        $old_tags = DB::table('hashtags')->where('hashtag_post_id',$article->article_id)->get();
        foreach($old_tags as $old_tags_row){
            DB::table('hashtags')->where('hashtag_post_id',$article->article_id)->delete();
        }
        DB::table('articles')->where('article_slug', $slug)->where('article_user_id',Auth::user()->id)->delete();
        return redirect()->to('/app/articles');
     
    }
    public function follow_user($username){
        $username_checker = DB::table("users")->where('username',$username)->first();
        $follow_user_id = $username_checker->id;
        $follower_id = auth()->user()->id;
        $follow_checker = DB::table("follows")->where('follow_user_id',$follow_user_id)->where('follower',$follower_id)->first();
        if(empty($follow_checker)){
            if($username_checker->pv == 1){
                DB::table('follows')->insert([
                    'follow_user_id' => $follow_user_id,
                    'follower' => $follower_id,
                    'accept' => 0,
                    "created_at" =>  \Carbon\Carbon::now(), 
                    "updated_at" => \Carbon\Carbon::now() 
                ]);    
            }else{
                DB::table('follows')->insert([
                    'follow_user_id' => "$follow_user_id",
                    'follower' => "$follower_id",
                    'accept' => 1,
                    "created_at" =>  \Carbon\Carbon::now(), 
                    "updated_at" => \Carbon\Carbon::now()
                ]);
            }
            Helper::create_notification($follower_id,$follow_user_id,'Added you to follows',null,null);
            return redirect()->back();
        }
    }
    public function unfollow_user($username){
        $username_checker = DB::table("users")->where('username',$username)->first();
        $follow_user_id = $username_checker->id;
        $follower_id = auth()->user()->id;
        DB::table('follows')->where('follow_user_id',$follow_user_id)->where('follower',$follower_id)->delete();
        Helper::create_notification($follower_id,$follow_user_id,'Deleted you from follower',null,null);
        return redirect()->back();
    }
    public function followhashtag(Request $request,$tagname){
        
        $tagname_clean = $tagname;     
        $follow_checker = DB::table("follows")->where('hashtag',$tagname_clean)->where('follower',Auth::user()->id)->first();
        if(empty($follow_checker)){
			$query = DB::table('follows')->insert([
                'hashtag' => "$tagname_clean",
                'follower' => Auth::user()->id,
                "created_at" =>  \Carbon\Carbon::now(), 
                "updated_at" => \Carbon\Carbon::now()
            ]);
            if(isset($query)){
                return redirect()->back();
			}else{
                return redirect()->back()->with('message', 'Error,Try again !');
			}

        }
    }
    public function unfollowhashtag(Request $request,$tagname){
        $tagname_clean = $tagname;     
        $follow_checker = DB::table("follows")->where('hashtag',$tagname_clean)->where('follower',Auth::user()->id)->first();
        $query = DB::table('follows')->where('hashtag',$tagname_clean)->where('follower',Auth::user()->id)->delete();
        if(isset($query)){
         return redirect()->back();
        }else{
            return redirect()->back()->with('message', 'Error,Try again !');
        }
    }
    public function articlereactionpost($react,$id){
            DB::table('reactions')->insert([
            'reaction_user_id' => Auth::user()->id,
            'reaction_content_id' => $id,
            'reaction_reaction' => $react,
            "created_at" =>  \Carbon\Carbon::now(), 
            "updated_at" => \Carbon\Carbon::now()
        ]);
        $finder = DB::table('articles')->where('article_id',$id)->first();
        $url = "#cid=".$finder->article_slug;
        return redirect()->back();
    }
    public function sendcommentforarticle($id){

    $validator = Validator::make(Request::all(), [
        'contentcomment' => 'nullable|ax:999|string',
        'comment_id' => 'nullable|ax:999|string'
   ]);
    $errors = $validator->errors();
    foreach ($errors->all() as $message) {
        return redirect()->back()->with('message', "$message");
        die();
    }

        if (Auth::user()){
            $query = DB::table('comments')->insert([
                'comment_anything_id' => $id,
                'comment_anything_type' => 'Article',
                'comment_body' => Request::input('contentcomment'),
                'comment_parrent_id' => Request::input('comment_id'),
                'comment_user_id' => Auth::user()->id,
                "created_at" =>  \Carbon\Carbon::now(), 
            "updated_at" => \Carbon\Carbon::now() 
            ]);
            $last_insert_id = DB::getPdo()->lastInsertId();
            $get_post_userid_q = DB::table('articles')->where('article_id',$id)->first();
            $get_post_userid_r = $get_post_userid_q->article_user_id;
            Helper::create_notification(Auth::user()->id,$get_post_userid_r,'Send comment for you',$last_insert_id,'comment');
            return redirect()->back()->with('message', 'Your comment was successfully submitted');
            }else{
                return redirect()->to('/user/dashboard')->with('message', 'For send comment you must login');
            }
    }
    public function user_connections_wall(Request $request)
    {
        $wall_account = DB::table("follows")->where('follower',Auth::user()->id)->get();
        foreach($wall_account as $wall_account_row){
            if($wall_account_row->follow_user_id != null){
                $article_user_id = $wall_account_row->follow_user_id;
                $get_connections_article = DB::table("articles")->where('article_user_id',"$article_user_id")->orderBy('article_id', "DESC")->paginate(30);
            }  
        }
        if(empty($get_connections_article)){
            return redirect()->to('/app/users')->with('message', 'You are not in contact with anyone, please meet a few people');
        }else{
            $articles = DB::table("articles")->where('article_user_id',"$article_user_id")->orderBy('article_id', "DESC")->paginate(30);
            return Inertia::render('LT/User/Auth/ConnectionsWall',[
                'articles' => $articles,
                'articles2' =>  DB::table("articles")->where('article_user_id',"$article_user_id")->orderBy('article_id', "DESC")->paginate(30)->map(function($articles2){
                    return [
                        'id' => $articles2->article_id,
                        'title' => $articles2->article_title,
                        'content' => Helper::limit_characters($articles2->article_content,150),
                        'slug' => $articles2->article_slug,
                        'image' => Helper::file_checker($articles2->article_id,'blog')
                    ];
                })
             ]);
        }
    }
    public function user_hashtags_wall(Request $request)
    {
        $wall_account = DB::table("follows")->where('follower',Auth::user()->id)->first();
        if($wall_account){
            $wall_account = DB::table("follows")->where('follower',Auth::user()->id)->get();
            foreach($wall_account as $wall_account_row){
             if($wall_account_row->hashtag != null){
                 $hashtag_title = $wall_account_row->hashtag;
                 $get_hashtags_article = DB::table("hashtags")->where('hashtag_title',"$hashtag_title")->orderBy('hashtag_id', "DESC")->paginate(30);
                 $articles = DB::table("articles")->where('article_title', 'LIKE', "%$hashtag_title%")->orwhere('article_content', 'LIKE', "%$hashtag_title%")->orderBy('article_id', "DESC")->paginate(30);
                 return Inertia::render('LT/User/Auth/HashtagsWall',[
                    'articles' => $articles,
                    'articles2' =>  DB::table("articles")->where('article_title', 'LIKE', "%$hashtag_title%")->orwhere('article_content', 'LIKE', "%$hashtag_title%")->orderBy('article_id', "DESC")->paginate(30)->map(function($articles2){
                        return [
                            'id' => $articles2->article_id,
                            'title' => $articles2->article_title,
                            'content' => Helper::limit_characters($articles2->article_content,150),
                            'slug' => $articles2->article_slug,
                            'image' => Helper::file_checker($articles2->article_id,'blog')
                        ];
                    })
                 ]);
             }
            
         }
        }else{
            return Inertia::render('LT/HashtagsFollow',[
                'hashtags' =>  DB::table('hashtags')->select('hashtag_title', DB::raw('COUNT(hashtag_title) as count'))
                ->groupBy('hashtag_title')->orderBy('count', 'DESC')->paginate(201)->map(function($hashtags){
                    return [
                    'randclass' => Helper::randclassforhashtag(),
                      'name' => $hashtags->hashtag_title,
                      'follow_checker' => Helper::hashtag_follow_unfollow_checker("$hashtags->hashtag_title")
                   ];
                }),
            ]); 
            // return redirect()->to('/app/hashtags')->with('message', 'You are not following any hashtags, please select one or more hashtags');
        }
        
    }
    public function add_nft($slug){
        if($slug == 'new'){
            $article = ['article_slug'=>'x','article_title'=>'x'];
            $slug = null;
            return Inertia::render('LT/User/Auth/SubmitNFT',[
                'article' => $article,
                'slug' => $slug
             ]); 
        }else{
            $nft_checker = Product::where('product_slug',$slug)->first();
            $article = Article::where('article_slug',$slug)->first();
            if(empty($nft_checker)){
                return Inertia::render('LT/User/Auth/SubmitNFT',[
                    'article' => $article,
                    'slug' => $slug
                 ]);
            }else{
                return redirect()->back()->with('message', "This product now NFT :|");
            }
        }
    }
    public function add_nft_submit(Request $request,$slug){
        $validator = Validator::make(Request::all(), [
            'name' => 'required|min:1|string',
            'price' => 'required|min:1|numeric',
            'content' => 'nullable|min:1|string',
            'attachfiles' => 'nullable','max:9999048',
            'attachfiles.*' => 'mimes:jpg,png,mp3,ogg,mp4,mov,jpeg,gif,pdf'
       ]);
        // $errors = $validator->errors();
        // foreach ($errors->all() as $message) {
        //     return redirect()->back()->with('message', "$message");
        //     die();
        // }
        $user_id = Auth::user()->id;
        $product_slug = Helper::encryptit(uniqid());
        $data = Product::create([
            'product_name' => Request::input('name'),
            'product_price' => Request::input('price'),
            'product_description' => Request::input('content'),
            'product_image' => 'infiles',
            'product_nft' => 1,
            'product_user_id' =>  Auth::user()->id,
            'product_owner_id' =>  Auth::user()->id,
            'product_slug' => $slug ,
            'product_uniqid' => $product_slug,
            "created_at" =>  \Carbon\Carbon::now(), 
            "updated_at" => \Carbon\Carbon::now()
        ]);
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
                          'type' => 'nft'
                      ]);
                  }
        }

        $url = url('/')."/app/nfts/".$product_slug;
        return redirect()->to("$url");
    }
    public function transactions(){

		$transactions = DB::table("transactions")->where('transaction_receiver_id',Auth::user()->id)->orderBy('id', "DESC")->paginate(30);
   

        $username0 = base64_encode((Auth::user()->username));
        $username01 = base64_encode($username0);
        $username02 = base64_encode($username01);
        $username03 = base64_encode($username02);
        $username04 = base64_encode($username03);
        $username05 = base64_encode($username04);
        $username06 = base64_encode($username05);
        $username07 = base64_encode($username06);
        $username08 = base64_encode($username07);
        $username09 = base64_encode($username08);
        $username10 = base64_encode($username09);
        $username11 = base64_encode($username10);
        $username12 = base64_encode($username11);
        $username13 = base64_encode($username12);
        $username = base64_encode($username13);



        return Inertia::render('LT/User/Auth/Transactions',[
            'username' =>  $username,
            'transactions' =>  $transactions->map(function($transactions){
                return [
                    'id' => $transactions->id,
                    'cryptoamount' => round($transactions->crypto_amount, 5),
                    'tokenid' => Helper::get_token_info($transactions->token_id)->name,
                    'transaction_comment_payer_id' => $transactions->transaction_comment_payer_id,
                    'date' => date('Y-m-d', strtotime($transactions->created_at)),
                    'received' => $transactions->received,
                    'id2' => Helper::encryptit($transactions->id),
                    'product' => $transactions->product,
                    'payercomment' => $transactions->transaction_comment_payer_id,
                    // 'purl' => Helper::find_product_by_slug($transactions->transaction_comment_payer_id)->product_uniqid,
                    'payerusername' => Helper::find_user_info($transactions->transaction_receiver_id)->username,
                ];
            })
         ]);
    }
    public function sendoffer($username,$slug){
        $product = Product::where('product_uniqid',$slug)->first();
        $username = Helper::find_user_info($product->product_user_id)->username;
        return Inertia::render('LT/User/Auth/SendOfferForNFT',[
            'product' => $product,
            'username' => $username
         ]);
    }
    public function sendofferpost($username,$slug){
        echo $username;
        // $product = Product::where('product_uniqid',$slug)->first();
        // return Inertia::render('LT/User/Auth/SendOfferForNFT',[
        //     'product' => $product           
        //  ]);
    }
    public function notes(){

        $note_paginate = DB::table('notes')->orderBy('note_id','DESC')->paginate(30);
        return Inertia::render('LT/User/Auth/Notes',[
            'note_paginate' => $note_paginate,
            'notes' =>  DB::table('notes')->orderBy('note_id','DESC')->paginate(30)->map(function($notes){
                return [
                    'id' => $notes->note_id,
                    'slug' => $notes->note_slug,
                    'color' => "background-color:".$notes->note_color."",
                    'content' => Helper::limit_characters($notes->note_content,190),
                    'time' =>  Carbon\Carbon::parse($notes->created_at)->diffForHumans()
                    ,
                ];
            })
         ]);
        
    }
    public function addnewnote(){
        return Inertia::render('LT/User/Auth/NewNote');
    }
    public function addnewnotesubmit(){

            $validator = Validator::make(Request::all(), [
                'content' => 'nullable|min:1|string',
                'color' => 'nullable|min:1|string',
                'filenames' => 'nullable','max:9048',
                'filenames.*' => 'mimes:jpg,png,mp3,ogg,mp4,mov,jpeg,gif,pdf'
           ]);
       
        $errors = $validator->errors();
        foreach ($errors->all() as $message) {
            return redirect()->back()->with('message', "$message");
            die();
        }
        if(empty(Request::input('content')) && empty(Request::input('filenames'))){
          return redirect()->back()->with('message', "Error!,You can not post blank content");
        }
        $user_id = Auth::user()->id;
        $title = Helper::limit_characters(Request::input('content'), 100);
      $slug = encrypt("$title");
      $data = Note::create([
          'note_content' => Request::input('content'),
          'note_slug'  => $slug,
          'note_color'  => Request::input('color'),
          'note_user_id'  => $user_id
      ]);


      if(Request::file('filenames') == null){
        $file_path = null;
       }else{
         
              foreach(Request::file('filenames') as $key => $files)
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
                      'type' => 'note'
                  ]);
              }
    }
    if(isset($data)){
        toast('Your note success added','success');
    }else{
        toast('Error,Try again !','error');
    }
    return redirect()->to("/app/notes");
    }
    public function noteview($slug){
         $note = Note::where('note_slug',$slug)->first();
         return Inertia::render('LT/User/Auth/NoteView',[
            'note' => $note,
            'id' => $note->note_id,
            'slug' => $note->note_slug,
            'title' => Helper::limit_characters($note->note_content,190),
            'time' =>  Carbon\Carbon::parse($note->created_at)->diffForHumans(),
            'getfiles' =>   Helper::files_checker($note->note_id,'note')->map(function($getfiles){
                return [
                    'f_id' => $getfiles->file_id,
                    'f_path' => asset($getfiles->file_path) 
             ];
            })
          ]);
    }
    public function editnote($slug){

        $validator = Validator::make(Request::all(), [
            'content' => 'nullable|min:1|string',
            'filenames' => 'nullable','max:9048',
            'filenames.*' => 'mimes:jpg,png,mp3,ogg,mp4,mov,jpeg,gif,pdf'
       ]);
   
    $errors = $validator->errors();
    foreach ($errors->all() as $message) {
        return redirect()->back()->with('message', "$message");
        die();
    }

       $note = DB::table('notes')->where('note_slug',$slug)->first();
           if(isset($note)){

              if(Request::file('image')){
                $old_files = DB::table('files')->where('file_content_id',$article->article_id)->where('type','note')->get();
                foreach($old_files as $old_files_row){
                    File::delete(public_path("$old_files_row->file_path"));
                    DB::table('files')->where('file_content_id',$article->article_id)->where('type','note')->delete();

                }
                foreach(Request::file('image') as $key => $files)
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
                        'file_user_id' => Auth::user()->id,
                        'file_path' => $file_path,
                        'file_content_id' => $article->article_id,
                        'type' => 'note'
                    ]);
                }
            }
        

            $title = Helper::limit_characters(Request::input('content'), 100);

            DB::table('notes')->where('note_slug',$slug)->where('note_user_id',Auth::user()->id)->update(array(
                'note_content' =>  Request::input('content'),
                'updated_at' => \Carbon\Carbon::now()
            ));

       

            $url = url('/')."/app/notes/";
            return redirect()->to("$url");
        }else{
            return redirect()->to('/')->with('message', 'Erro !');
        }

    }
    public function delete_note($slug){

        $note = Note::where('note_slug',$slug)->where('note_user_id',Auth::user()->id)->first();
        $old_files = DB::table('files')->where('file_content_id',$note->note_id)->where('type','note')->get();
        foreach($old_files as $old_files_row){
            File::delete(public_path("$old_files_row->file_path"));
            DB::table('files')->where('file_content_id',$note->note_id)->where('type','note')->delete();
        }
        DB::table('notes')->where('note_slug', $slug)->where('note_user_id',Auth::user()->id)->delete();
        return redirect()->to('/app/notes');
     
    }
    public function userhomeshopindex(){
        $products = Product::orderBy('product_id','DESC')->where('product_nft',0)->where('product_user_id',Auth::user()->id)->paginate(30);
        return Inertia::render('LT/User/Auth/Products', [
        'products' => $products,
        'products2' =>  Product::orderBy('product_id','DESC')->where('product_nft',0)->where('product_user_id',Auth::user()->id)->paginate(30)->map(function($products2){
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
    public function newproduct(){
        return Inertia::render('LT/User/Auth/SubmitProduct'); 
    }
    public function submitproduct(){
        $validator = Validator::make(Request::all(), [
            'physicaldeliveryrequired' => 'nullable|min:1|max:300|string',
            'name' => 'required|min:1|string',
            'city' => 'required|min:1|max:599|string',
            'price' => 'required|min:1|numeric',
            'content' => 'nullable|min:1|string',
            'attachfiles' => 'nullable','max:9999048',
            'attachfiles.*' => 'mimes:jpg,png,mp3,ogg,mp4,mov,jpeg,gif,pdf'
       ]);
        // $errors = $validator->errors();
        // foreach ($errors->all() as $message) {
        //     return redirect()->back()->with('message', "$message");
        //     die();
        // }
        $user_id = Auth::user()->id;
        $product_slug = Helper::encryptit(uniqid());
        if(Request::input('physicaldeliveryrequired')){
            $product_delivery = Request::input('physicaldeliveryrequired');
        }else{
            $product_delivery = 0;
        }
       
        $data = Product::create([
            'product_name' => Request::input('name'),
            'product_price' => Request::input('price'),
            'product_description' => Request::input('content'),
            'product_image' => 'infiles',
            'product_nft' => 0,
            'product_city' => Request::input('city'),
            'product_user_id' =>  Auth::user()->id,
            'product_owner_id' =>  Auth::user()->id,
            'product_slug' => uniqid() ,
            'product_uniqid' => $product_slug,
            'product_delivery' => Request::input('physicaldeliveryrequired'),
            "created_at" =>  \Carbon\Carbon::now(), 
            "updated_at" => \Carbon\Carbon::now()
        ]);
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
                          'type' => 'shop'
                      ]);
                  }
        }

        $url = url('/')."/app/products/".$product_slug;
        return redirect()->to("$url");
    }
    public function delete_product($slug){
       
        $product = Product::where('product_uniqid',$slug)->where('product_owner_id',Auth::user()->id)->first();        
        $old_files = DB::table('files')->where('file_content_id',$product->product_id)->where('type','shop')->get();
        foreach($old_files as $old_files_row){
            File::delete(public_path("$old_files_row->file_path"));
            DB::table('files')->where('file_content_id',$product->product_id)->where('type','shop')->delete();
        }
        DB::table('products')->where('product_uniqid', $slug)->where('product_owner_id',Auth::user()->id)->delete();
        return redirect()->to('/user/products');
     
    }
    public function orders(){
        $product = Product::where('product_owner_id',Auth::user()->id)->first();        
        if(isset($product)){
            $transactions = DB::table("transactions")->where('transaction_receiver_id',Auth::user()->id)->where('transaction_comment_payer_id','!=',null)->where('product',1)->orderBy('id', "DESC")->paginate(30);
            return Inertia::render('LT/User/Auth/Orders',[
                'transactions' =>  $transactions->map(function($transactions){
                    return [
                        'id' => $transactions->id,
                        'cryptoamount' => round($transactions->crypto_amount, 5),
                        'tokenid' => Helper::get_token_info($transactions->token_id)->name,
                        'date' => date('Y-m-d', strtotime($transactions->created_at)),
                        'received' => $transactions->received,
                        'product' => $transactions->product,	
                        'uniqid' => $transactions->uniqid,
                        'delivery' => $transactions->transaction_delivery,
                        'payercomment' => Helper::product_finder_uniqid($transactions->transaction_comment_payer_id)->product_name,
                        'producturl' => Helper::product_finder_uniqid($transactions->transaction_comment_payer_id)->product_uniqid,
                        'useraddress' => $transactions->transaction_user_address,
                        'payerusername' => Helper::find_user_info($transactions->transaction_receiver_id)->username,
                    ];
                })
             ]);
        }else{
            return Inertia::render('Msg', [
                'msg' => "You have no orders"
                ]);
        }

    }
    public function rejectorder($slug){
		// $transaction = DB::table("transactions")->where('uniqid',$slug)->where('transaction_receiver_id',Auth::user()->id)->first();
        $transaction = DB::table('transactions')->where('uniqid',$slug)->where('transaction_receiver_id',Auth::user()->id)->update(array('transaction_delivery' => 'Order has been rejected by seller and the money will be returned to your wallet within the next 24 hours, if you have not entered your wallet address, go to settings and enter your Tron trc20 wallet Tether address and update profile','transaction_receiver_id'=> 3,'updated_at' => \Carbon\Carbon::now() ));
        return redirect()->back();
    }
    public function acceptorder($slug){
        DB::table('transactions')->where('uniqid',$slug)->where('transaction_receiver_id',Auth::user()->id)->update(array('transaction_delivery' => 'Order has been confirmed by seller, please wait for delivery','updated_at' => \Carbon\Carbon::now() ));
        $transaction = DB::table("transactions")->where('uniqid',$slug)->where('transaction_receiver_id',Auth::user()->id)->first();
        return Inertia::render('LT/User/Auth/OrderDelivery', [
            'uniqid' => $transaction->uniqid,
            'address' => $transaction->transaction_user_address,
        ]);
    }
    public function acceptorderpost(){
        $validator = Validator::make(Request::all(), [
            'uniqid' => 'required','string',
            'image' => 'nullable','max:9999999999048',
            'image.*' => 'mimes:jpg,png,mp3,ogg,mp4,m4p,3gp,m4v,mov,jpeg,gif,pdf,mov,mp3'
       ]);
   
    $errors = $validator->errors();
    foreach ($errors->all() as $message) {
        return redirect()->back()->with('message', "$message");
        die();
    }
    $uid = Request::input('uniqid');
    $transaction = DB::table("transactions")->where('uniqid',$uid)->where('transaction_receiver_id',Auth::user()->id)->first();
    $tid = $transaction->id;
    if(Request::file('image')){
       
        foreach(Request::file('image') as $key => $files)
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
                'file_user_id' => Auth::user()->id,
                'file_path' => $file_path,
                'file_content_id' => $tid,
                'type' => 'OrderDelivery'
            ]);
        }
    }


    DB::table('transactions')->where('uniqid',$uid)->where('transaction_receiver_id',Auth::user()->id)->update(array('transaction_delivery' => 'delivered','updated_at' => \Carbon\Carbon::now() ));

    return Inertia::render('Msg', [
        'msg' => "Thank you for delivering order. After buyer's confirmation,Money will be deposited into your account within max next 24 hours"
        ]);
   
    }
    public function transactionsany($any){
        // $id = Helper::decryptit($any);
        
        $url = "/user/transactions#".$any;
        return redirect()->to($url);

       
    }
    public function showmessage($any){

        // echo $any;
    $id = Helper::decryptit($any);
    $msgchhecker = DB::table('messages')->where('message_id',$id)->first();
    if($msgchhecker){
        $uid =   $msgchhecker->message_uniqid;
        $msfinder = DB::table('messages')->where('message_uniqid',$uid)->orderBy('message_id', 'DESC')->paginate(10);
        return Inertia::render('Messages/Report',[
            'uid' => $uid,
            'msfinder2' =>   DB::table('messages')->where('message_uniqid',$uid)->orderBy('message_id', 'DESC')->paginate(10)->map(function($msfinder2){
                return [
                    'id' => $msfinder2->message_id,
                    'content' => $msfinder2->message_content,
                    'sender' =>  Helper::find_user_info($msfinder2->message_sender_id)->username,
                    'receiver' =>  Helper::find_user_info($msfinder2->message_receiver_id)->username,
                    'uid' => $msfinder2->message_uniqid,
                    'aid' => $msfinder2->message_anything_id,
                    'atype' => $msfinder2->message_anything_type,
                    'time' => \Carbon\Carbon::createFromTimeStamp(strtotime($msfinder2->created_at))->diffForHumans()

                ];
            }),
        ]);
    }else{
   return redirect()->back()->with('message', 'We do not have such messages');
    }
    }
    public function deliveryproblemanswermessage(){
        $validator = Validator::make(Request::all(), [
            'uid' => 'required|min:1|string',
            'message' => 'required|min:1|string',
            'attachfiles' => 'nullable','max:9999048',
            'attachfiles.*' => 'mimes:jpg,png,mp3,ogg,mp4,mov,jpeg,gif,pdf'
       ]);
        $errors = $validator->errors();
     foreach ($errors->all() as $message) {
        return redirect()->back()->with('message', "$message");
        die();
    }
        $unid =  Request::input('uid');
            $msfinder = DB::table('messages')->where('message_uniqid',$unid)->Orwhere('message_receiver_id',Auth::user()->id)->Orwhere('message_sender_id',Auth::user()->id)->first();
            DB::table('messages')->insert([
            'message_receiver_id' => $msfinder->message_receiver_id,
            'message_sender_id' => Auth::user()->id,
            'message_content' => Request::input('message'),
            'message_anything_id' => $msfinder->message_anything_id,
            'message_anything_type' => 'Transaction, delivery problem',
            'message_uniqid' => $unid,
            "created_at" =>  \Carbon\Carbon::now(), 
        "updated_at" => \Carbon\Carbon::now() 
        ]);
        $liid = DB::getPdo()->lastInsertId();
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
                          'file_content_id' => $liid,
                          'type' => 'Transaction, delivery problem'
                      ]);
                  }
        }
       $msg =  Helper::limit_characters(Request::input('message'), 100);
    Helper::create_notification(Auth::user()->id,$msfinder->message_receiver_id,$msg,$liid,'Transaction, delivery problem');
    return redirect()->back()->with('message', 'Your message has been successfully sent');

    }
    


}
