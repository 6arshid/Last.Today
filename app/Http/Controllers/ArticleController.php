<?php

namespace App\Http\Controllers;

use Request,Auth,Validator,Alert,Image;
use Inertia\Inertia;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index(){
        return Inertia::render('Articles/Index',[
            'articles' =>  Article::orderBy('article_id','DESC')->get()->map(function($article){
                return [
                    'id' => $article->article_id,
                    'title' => $article->article_title,
                    'content' => $article->article_content,
                    'slug' => $article->article_slug,
                    'image' => asset($article->article_image)
                ];
            })
         ]);
        
    }
    public function  new(){
        return Inertia::render('Articles/New');
    }
    public function submit(){
        if (Auth::user()){
            $validator = Validator::make(Request::all(), [
                'content' => 'nullable|min:1',
                'attachfiles' => 'nullable','max:9999048',
                'attachfiles.*' => 'mimes:jpg,png,mp3,ogg,mp4,mov,jpeg,gif,pdf'
           ]);
        }else{
            $validator = Validator::make(Request::all(), [
                'content' => 'nullable|min:1',
                'attachfiles' => 'nullable','max:9999048',
                'attachfiles.*' => 'mimes:jpg,png,mp3,ogg,mp4,mov,jpeg,gif,pdf'
           ]);
        }
        $errors = $validator->errors();
        foreach ($errors->all() as $message) {
            // toast("$message",'error');
            return redirect()->back();
            die();
        }
        if(Request::file('attachfiles') == null){
            $filePath = null;
        }else{
            $filename = uniqid().Request::file('attachfiles')->getClientOriginalName();
            $file = Request::file('attachfiles');
            
            if(preg_match('/\.(jpg|png|jpeg)$/', $filename)) {
                $img = Image::make($file);
                $img->resize(800, 800);
                $img->save("files/images/".$filename);
                $file_path = "files/images/".$filename;
            }else{
                $files->move('files/blogs', $filename);
                $file_path = 'files/blogs/'. $filename;

            }
        }       
        Article::create([
            'article_title' => Request::input('content'),
            'article_content' => Request::input('content'),
            'article_image'  => $file_path,
        ]);
        return redirect()->to('/app/articles')->with('success','File has been uploaded.');

    }
    public function edit($id){
        $article = Article::where('article_id',$id)->first();
        return Inertia::render('Articles/Edit',[
            'article' =>  $article,
            'image' => asset($article->article_image)
         ]);
    }
    public function submiteditform($id){
        DB::table('articles')->where('article_id',$id)->update(array('article_title' => Request::input('content'),'updated_at' => \Carbon\Carbon::now() ));
    }
    public function delete($id){
        DB::table('articles')->where('article_id', $id)->delete();
        return redirect()->to('/app/articles');
    }

}
