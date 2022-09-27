<?php

namespace App\Http\Controllers;

use Request,Auth,Validator,Alert,Image,Helper,Str;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Token;
use App\Models\Transaction;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;class PayController extends Controller
{

    public function buynft($username,$slug,$price){
      $product = Product::where('product_uniqid',$slug)->first();
      $tokens = Token::all();
      return Inertia::render('LT/Pay/NFTCheckout',[
         'product' =>  $product,
         'username' => $username,
         'price' => $price,
         'tokens' => $tokens
      ]);

    }
   
    public function payforuser($username)
    {
       $amount = 0;
       $tokens = Token::all();
       return view('lt.bank.transactioncheckout',compact(['tokens','amount']));

    }

}
