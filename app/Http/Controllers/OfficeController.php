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

class OfficeController extends Controller
{
    public function information(){
        return Inertia::render('LT/Information');
    }
    public function about(){
        return Inertia::render('Office/About');
    }
    public function contact(){
        return Inertia::render('Office/Contact');
    }
    public function rules(){
        return Inertia::render('Office/Rules');
    }
}
