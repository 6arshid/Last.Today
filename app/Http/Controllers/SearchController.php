<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Article;
use App\Models\User;
use DB,Request,Validator,Helper,Http;

class SearchController extends Controller
{
   public function search_result(){

    $validator = Validator::make(Request::all(), [
      'search' => 'nullable|max:999|string'
 ]);
  $errors = $validator->errors();
  foreach ($errors->all() as $message) {
      return redirect()->back()->with('message', "$message");
      die();
  }
  $keyword = Request::input('search');
  // $curl = Helper::curl_page("https://en.wikipedia.org/wiki/"."$keyword");

  $endpoint ="https://en.wikipedia.org/wiki/" .$keyword ;
  $response = Http::get($endpoint);




// or when your server returns json
// $content = json_decode($response->getBody(), true);

  preg_match("'<div class=\"side-box metadata side-box-right contains-special-characters noprint selfref\" style=\"width: 290px;\">(.*?)<\/p>'si", $response->body(), $wikipediapost);
  if($wikipediapost){
    $wikipediapostdata = $wikipediapost;
  }else{
    $wikipediapostdata = null;
  }
       if(Request::input('search')){
        $keyword = Request::input('search');


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

        

       }else{
        $keyword = 'Search ...';
       }
       $twitter = "https://twitter.com/search?q=".$keyword;
       $youtube = "https://www.youtube.com/results?search_query=".$keyword;
       $instagram = "https://www.instagram.com/explore/tags/".$keyword;
       $facebook = "https://www.facebook.com/search/top/?q=".$keyword;
       $linkedin = "https://www.linkedin.com/search/results/all/?keywords=".$keyword;
       $reddit = "https://www.reddit.com/search?q=".$keyword;
       $wikipedia = "https://en.wikipedia.org/w/index.php?search=".$keyword;
       $britannica = "https://www.britannica.com/search?query=".$keyword;
       $linktr = "https://linktr.ee/".$keyword;
       $archive = "https://archive.org/search.php?query=".$keyword;
       $google = "https://www.google.com/search?q=".$keyword;
       $googlefinance = "https://finance.google.com/finance?q=".$keyword;
       $googlemaps = "https://www.google.com/maps/search/".$keyword;
       $googlenews = "https://news.google.com/search?q=".$keyword;
       $googledrive = "https://drive.google.com/drive/u/0/search?q=".$keyword;
       $timeanddate = "https://www.timeanddate.com/weather/".$keyword."/".$keyword."/ext";
       $weatherforecast = "https://www.weather-forecast.com/locations/".$keyword."/forecasts/latest";
       $cnn = "https://www.cnn.com/search/?q=".$keyword;
       $foxnews = "http://www.foxnews.com/search-results/search?q=".$keyword;
       $bbc = "https://www.bbc.co.uk/search?q=".$keyword;
       $cbc = "http://www.cbc.ca/search?q=".$keyword;
       $nationalpost = "http://nationalpost.com/?s=".$keyword;
       $nytimes = "https://www.nytimes.com/search?query=".$keyword;
       $dailymail = "https://www.dailymail.co.uk/s/h/search.html?sel=site&amp;searchPhrase=".$keyword;
       $independent = "https://www.independent.co.uk/topic/".$keyword;
       $newyorker = "https://www.newyorker.com/search/q/".$keyword;
       $aljazeera = "https://www.aljazeera.com/search/".$keyword;
       $spotify = "https://open.spotify.com/search/".$keyword;
       $soundcloud = "https://soundcloud.com/search?q=".$keyword;
       $allmusic = "https://www.allmusic.com/search/all/".$keyword;
       $azlyrics = "https://search.azlyrics.com/search.php?q=".$keyword;
       $lastfm = "https://www.last.fm/search?q=".$keyword;
       $espn = "https://www.espn.com/search/_/q/".$keyword;
       $skysports = "https://www.skysports.com/search?q=".$keyword;
       $si = "https://www.si.com/search?query=".$keyword;
       $imdb = "http://www.imdb.com/find?ref_=nv_sr_fn&amp;q=".$keyword;
       $netflix = "https://www.netflix.com/search?q=".$keyword;
       $apple = "https://www.apple.com/ca/search/".$keyword;
       $rottentomatoes = "https://www.rottentomatoes.com/search/?search=".$keyword;
       $yahoofinance = "https://finance.yahoo.com/lookup?s=".$keyword;
       $investopedia = "https://www.investopedia.com/search?q=".$keyword;
       $forbes = "https://www.forbes.com/search/?q=".$keyword;
       $businessinsider = "http://www.businessinsider.com/s?q=".$keyword;
       $algolia = "https://hn.algolia.com/?query=".$keyword;
       $ibtimes = "http://www.ibtimes.com/search/site/".$keyword;
       $seekingalpha = "https://seekingalpha.com/search/?q=".$keyword;
       $amazon = "https://www.amazon.com/s/?field-keywords=".$keyword;
       $ebay = "https://www.ebay.com/sch/i.html?_nkw=".$keyword;
       $ikea = "http://www.ikea.com/ca/en/search/?query=".$keyword;
       $etsy = "https://www.etsy.com/search?q=".$keyword;
       $kohls = "https://www.kohls.com/search.jsp?submit-search=web-regular&amp;search=".$keyword;
       $overstock = "https://www.overstock.com/search?keywords=".$keyword;
       $duckduckgo = "https://duckduckgo.com/?q=".$keyword;
       $bing = "https://www.bing.com/search?q=".$keyword;
       $yandex = "https://yandex.com/search/?text=".$keyword;
       $ecosia = "https://www.ecosia.org/search?q=".$keyword;
       $qwant = "https://www.qwant.com/?q=".$keyword;
       $lt = "https://last.today/search/".$keyword;
       $pinterest = "https://www.pinterest.com/search/pins/?q=".$keyword;
       $tumblr = "https://www.tumblr.com/search/".$keyword;
       $dribbble = "https://dribbble.com/search?q=".$keyword;
       $giphy = "https://giphy.com/search/".$keyword;
       $imgur = "https://imgur.com/search?q=".$keyword;
       $pexels = "https://www.pexels.com/search/".$keyword;
       $istockphoto = "http://www.istockphoto.com/photos/".$keyword;
       $houzz = "https://www.houzz.com/photos/query/".$keyword;
       $dwell = "https://www.dwell.com/discover/".$keyword;
       $homedepot = "http://www.homedepot.com/s/".$keyword;
       $yelp = "https://www.yelp.ca/search?find_desc=".$keyword;
       $stackoverflow = "https://stackoverflow.com/search?q=".$keyword;
       $stackexchange = "https://stackexchange.com/search?q=".$keyword;
       $github = "https://github.com/search?q=".$keyword;
       $codepen = "https://codepen.io/search/pens?q=".$keyword;
       $sourceforge = "https://sourceforge.net/directory/os:mac/?q=".$keyword;
       $quora = "https://www.quora.com/search?q=".$keyword;
       $fiverr = "https://www.fiverr.com/search/gigs?query=".$keyword;
       $jw = "https://www.jw.org/en/search/?q=".$keyword;
       $bible = "https://www.bible.com/search/bible?query=".$keyword;
       $quran = "https://quran.com/search?page=1&q=".$keyword."&translations=131";
       $pornhub = "https://www.pornhub.com/video/search?search=".$keyword;
       $xvideos = "https://www.xvideos.com/?k=".$keyword;
       $xhamster = "https://xhamster.com/search/".$keyword;
       $imlive = "https://imlive.com/hostlist.ashx/?sstr=".$keyword; 
       $user_search = User::where('email', 'LIKE', "%$keyword%")->orwhere('name', 'LIKE', "%$keyword%")->orderBy('id','DESC')->take(30)->get();
       $article_search = User::where('email', 'LIKE', "%$keyword%")->orwhere('name', 'LIKE', "%$keyword%")->orderBy('id','DESC')->take(30)->get();
       $lastfm = "https://www.last.fm/search?q=".$keyword;
       $soundcloud = "https://soundcloud.com/search?q=".$keyword;
       $spotify = "https://open.spotify.com/search/".$keyword;
       $duckduckgo = "https://duckduckgo.com/?q=".$keyword."&ia=web";
     
       





       return Inertia::render('LT/SearchResult',[
        'user_search' => $user_search,
        'articles' =>  Article::where('article_title', 'LIKE', "%$keyword%")->orderBy('article_id','DESC')->take(30)->get()->map(function($articles){
            return [
              'id' => $articles->article_id,
              'title' => $articles->article_title,
              'content' => Helper::limit_characters($articles->article_content,99),
              'slug' => $articles->article_slug,
              'image' => asset($articles->article_image)
            ];
        }),
        'duckduckgo' => $duckduckgo,
        'lastfm' => $lastfm,
        'soundcloud' => $soundcloud,
        'spotify' => $spotify,
        'keyword' => $keyword,
        'twitter' => $twitter,
        'youtube' => $youtube,
        'instagram' => $instagram,
        'facebook' => $facebook,
        'linkedin' => $linkedin,
        'reddit' => $reddit,
        'wikipedia' => $wikipedia,
        'britannica' => $britannica,
        'linktr' => $linktr,
        'archive' => $archive,
        'google' => $google,
        'googlefinance' => $googlefinance,
        'googlemaps' => $googlemaps,
        'googlenews' => $googlenews,
        'googledrive' => $googledrive,
        'timeanddate' => $timeanddate,
        'weatherforecast' => $weatherforecast,
        'cnn' => $cnn,
        'foxnews' => $foxnews,
        'bbc' => $bbc,
        'cbc' => $cbc,
        'nationalpost' => $nationalpost,
        'nytimes' => $nytimes,
        'dailymail' => $dailymail,
        'independent' => $independent,
        'newyorker' => $newyorker,
        'aljazeera' => $aljazeera,
        'spotify' => $spotify,
        'soundcloud' => $soundcloud,
        'allmusic' => $allmusic,
        'azlyrics' => $azlyrics,
        'lastfm' => $lastfm,
        'espn' => $espn,
        'skysports' => $skysports,
        'si' => $si,
        'imdb' => $imdb,
        'netflix' => $netflix,
        'apple' => $apple,
        'rottentomatoes' => $rottentomatoes,
        'yahoofinance' => $yahoofinance,
        'investopedia' => $investopedia,
        'forbes' => $forbes,
        'businessinsider' => $businessinsider,
        'algolia' => $algolia,
        'ibtimes' => $ibtimes,
        'seekingalpha' => $seekingalpha,
        'amazon' => $amazon,
        'ebay' => $ebay,
        'ikea' => $ikea,
        'etsy' => $etsy,
        'kohls' => $kohls,
        'wikipediapostdata' => $wikipediapostdata,
        'overstock' => $overstock,
        'duckduckgo' => $duckduckgo,
        'bing' => $bing,
        'yandex' => $yandex,
        'ecosia' => $ecosia,
        'qwant' => $qwant,
        'lt' => $lt,
        'pinterest' => $pinterest,
        'tumblr' => $tumblr,
        'dribbble' => $dribbble,
        'giphy' => $giphy,
        'imgur' => $imgur,
        'pexels' => $pexels,
        'istockphoto' => $istockphoto,
        'houzz' => $houzz,
        'dwell' => $dwell,
        'homedepot' => $homedepot,
        'yelp' => $yelp,
        'stackoverflow' => $stackoverflow,
        'stackexchange' => $stackexchange,
        'github' => $github,
        'codepen' => $codepen,
        'sourceforge' => $sourceforge,
        'quora' => $quora,
        'fiverr' => $fiverr,
        'jw' => $jw,
        'bible' => $bible,
        'quran' => $quran,
        'pornhub' => $pornhub,
        'xvideos' => $xvideos,
        'xhamster' => $xhamster,
        'imlive' => $imlive,
     ]);
     
   }
   public function search_result_name($name){


    $validator = Validator::make(Request::all(), [
      'name' => 'nullable|max:999|string'
 ]);
  $errors = $validator->errors();
  foreach ($errors->all() as $message) {
      return redirect()->back()->with('message', "$message");
      die();
  }

      $keyword = $name;
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
     
    $twitter = "https://twitter.com/search?q=".$keyword;
    $youtube = "https://www.youtube.com/results?search_query=".$keyword;
    $instagram = "https://www.instagram.com/explore/tags/".$keyword;
    $facebook = "https://www.facebook.com/search/top/?q=".$keyword;
    $linkedin = "https://www.linkedin.com/search/results/all/?keywords=".$keyword;
    $reddit = "https://www.reddit.com/search?q=".$keyword;
    $wikipedia = "https://en.wikipedia.org/w/index.php?search=".$keyword;
    $britannica = "https://www.britannica.com/search?query=".$keyword;
    $linktr = "https://linktr.ee/".$keyword;
    $archive = "https://archive.org/search.php?query=".$keyword;
    $google = "https://www.google.com/search?q=".$keyword;
    $googlefinance = "https://finance.google.com/finance?q=".$keyword;
    $googlemaps = "https://www.google.com/maps/search/".$keyword;
    $googlenews = "https://news.google.com/search?q=".$keyword;
    $googledrive = "https://drive.google.com/drive/u/0/search?q=".$keyword;
    $timeanddate = "https://www.timeanddate.com/weather/".$keyword."/".$keyword."/ext";
    $weatherforecast = "https://www.weather-forecast.com/locations/".$keyword."/forecasts/latest";
    $cnn = "https://www.cnn.com/search/?q=".$keyword;
    $foxnews = "http://www.foxnews.com/search-results/search?q=".$keyword;
    $bbc = "https://www.bbc.co.uk/search?q=".$keyword;
    $cbc = "http://www.cbc.ca/search?q=".$keyword;
    $nationalpost = "http://nationalpost.com/?s=".$keyword;
    $nytimes = "https://www.nytimes.com/search?query=".$keyword;
    $dailymail = "https://www.dailymail.co.uk/s/h/search.html?sel=site&amp;searchPhrase=".$keyword;
    $independent = "https://www.independent.co.uk/topic/".$keyword;
    $newyorker = "https://www.newyorker.com/search/q/".$keyword;
    $aljazeera = "https://www.aljazeera.com/search/".$keyword;
    $spotify = "https://open.spotify.com/search/".$keyword;
    $soundcloud = "https://soundcloud.com/search?q=".$keyword;
    $allmusic = "https://www.allmusic.com/search/all/".$keyword;
    $azlyrics = "https://search.azlyrics.com/search.php?q=".$keyword;
    $lastfm = "https://www.last.fm/search?q=".$keyword;
    $espn = "https://www.espn.com/search/_/q/".$keyword;
    $skysports = "https://www.skysports.com/search?q=".$keyword;
    $si = "https://www.si.com/search?query=".$keyword;
    $imdb = "http://www.imdb.com/find?ref_=nv_sr_fn&amp;q=".$keyword;
    $netflix = "https://www.netflix.com/search?q=".$keyword;
    $apple = "https://www.apple.com/ca/search/".$keyword;
    $rottentomatoes = "https://www.rottentomatoes.com/search/?search=".$keyword;
    $yahoofinance = "https://finance.yahoo.com/lookup?s=".$keyword;
    $investopedia = "https://www.investopedia.com/search?q=".$keyword;
    $forbes = "https://www.forbes.com/search/?q=".$keyword;
    $businessinsider = "http://www.businessinsider.com/s?q=".$keyword;
    $algolia = "https://hn.algolia.com/?query=".$keyword;
    $ibtimes = "http://www.ibtimes.com/search/site/".$keyword;
    $seekingalpha = "https://seekingalpha.com/search/?q=".$keyword;
    $amazon = "https://www.amazon.com/s/?field-keywords=".$keyword;
    $ebay = "https://www.ebay.com/sch/i.html?_nkw=".$keyword;
    $ikea = "http://www.ikea.com/ca/en/search/?query=".$keyword;
    $etsy = "https://www.etsy.com/search?q=".$keyword;
    $kohls = "https://www.kohls.com/search.jsp?submit-search=web-regular&amp;search=".$keyword;
    $overstock = "https://www.overstock.com/search?keywords=".$keyword;
    $duckduckgo = "https://duckduckgo.com/?q=".$keyword;
    $bing = "https://www.bing.com/search?q=".$keyword;
    $yandex = "https://yandex.com/search/?text=".$keyword;
    $ecosia = "https://www.ecosia.org/search?q=".$keyword;
    $qwant = "https://www.qwant.com/?q=".$keyword;
    $lt = "https://last.today/search/".$keyword;
    $pinterest = "https://www.pinterest.com/search/pins/?q=".$keyword;
    $tumblr = "https://www.tumblr.com/search/".$keyword;
    $dribbble = "https://dribbble.com/search?q=".$keyword;
    $giphy = "https://giphy.com/search/".$keyword;
    $imgur = "https://imgur.com/search?q=".$keyword;
    $pexels = "https://www.pexels.com/search/".$keyword;
    $istockphoto = "http://www.istockphoto.com/photos/".$keyword;
    $houzz = "https://www.houzz.com/photos/query/".$keyword;
    $dwell = "https://www.dwell.com/discover/".$keyword;
    $homedepot = "http://www.homedepot.com/s/".$keyword;
    $yelp = "https://www.yelp.ca/search?find_desc=".$keyword;
    $stackoverflow = "https://stackoverflow.com/search?q=".$keyword;
    $stackexchange = "https://stackexchange.com/search?q=".$keyword;
    $github = "https://github.com/search?q=".$keyword;
    $codepen = "https://codepen.io/search/pens?q=".$keyword;
    $sourceforge = "https://sourceforge.net/directory/os:mac/?q=".$keyword;
    $quora = "https://www.quora.com/search?q=".$keyword;
    $fiverr = "https://www.fiverr.com/search/gigs?query=".$keyword;
    $jw = "https://www.jw.org/en/search/?q=".$keyword;
    $bible = "https://www.bible.com/search/bible?query=".$keyword;
    $quran = "https://quran.com/search?page=1&q=".$keyword."&translations=131";
    $pornhub = "https://www.pornhub.com/video/search?search=".$keyword;
    $xvideos = "https://www.xvideos.com/?k=".$keyword;
    $xhamster = "https://xhamster.com/search/".$keyword;
    $imlive = "https://imlive.com/hostlist.ashx/?sstr=".$keyword;       $user_search = User::where('email', 'LIKE', "%$keyword%")->orwhere('name', 'LIKE', "%$keyword%")->orderBy('id','DESC')->take(30)->get();
    $article_search = User::where('email', 'LIKE', "%$keyword%")->orwhere('name', 'LIKE', "%$keyword%")->orderBy('id','DESC')->take(30)->get();
    $lastfm = "https://www.last.fm/search?q=".$keyword;
    $soundcloud = "https://soundcloud.com/search?q=".$keyword;
    $spotify = "https://open.spotify.com/search/".$keyword;
    $duckduckgo = "https://duckduckgo.com/?q=".$keyword."&ia=web";
  
    
    return Inertia::render('LT/SearchResult',[
     'user_search' => $user_search,
     'articles' =>  Article::where('article_title', 'LIKE', "%$keyword%")->orderBy('article_id','DESC')->take(30)->get()->map(function($articles){
         return [
           'id' => $articles->article_id,
           'title' => $articles->article_title,
           'content' => Helper::limit_characters($articles->article_content,99),
           'slug' => $articles->article_slug,
           'image' => asset($articles->article_image)
         ];
     }),
     'duckduckgo' => $duckduckgo,
     'lastfm' => $lastfm,
     'soundcloud' => $soundcloud,
     'spotify' => $spotify,
     'keyword' => $keyword,
     'twitter' => $twitter,
     'youtube' => $youtube,
     'instagram' => $instagram,
     'facebook' => $facebook,
     'linkedin' => $linkedin,
     'reddit' => $reddit,
     'wikipedia' => $wikipedia,
     'britannica' => $britannica,
     'linktr' => $linktr,
     'archive' => $archive,
     'google' => $google,
     'googlefinance' => $googlefinance,
     'googlemaps' => $googlemaps,
     'googlenews' => $googlenews,
     'googledrive' => $googledrive,
     'timeanddate' => $timeanddate,
     'weatherforecast' => $weatherforecast,
     'cnn' => $cnn,
     'foxnews' => $foxnews,
     'bbc' => $bbc,
     'cbc' => $cbc,
     'nationalpost' => $nationalpost,
     'nytimes' => $nytimes,
     'dailymail' => $dailymail,
     'independent' => $independent,
     'newyorker' => $newyorker,
     'aljazeera' => $aljazeera,
     'spotify' => $spotify,
     'soundcloud' => $soundcloud,
     'allmusic' => $allmusic,
     'azlyrics' => $azlyrics,
     'lastfm' => $lastfm,
     'espn' => $espn,
     'skysports' => $skysports,
     'si' => $si,
     'imdb' => $imdb,
     'netflix' => $netflix,
     'apple' => $apple,
     'rottentomatoes' => $rottentomatoes,
     'yahoofinance' => $yahoofinance,
     'investopedia' => $investopedia,
     'forbes' => $forbes,
     'businessinsider' => $businessinsider,
     'algolia' => $algolia,
     'ibtimes' => $ibtimes,
     'seekingalpha' => $seekingalpha,
     'amazon' => $amazon,
     'ebay' => $ebay,
     'ikea' => $ikea,
     'etsy' => $etsy,
     'kohls' => $kohls,
     'overstock' => $overstock,
     'duckduckgo' => $duckduckgo,
     'bing' => $bing,
     'yandex' => $yandex,
     'ecosia' => $ecosia,
     'qwant' => $qwant,
     'lt' => $lt,
     'pinterest' => $pinterest,
     'tumblr' => $tumblr,
     'dribbble' => $dribbble,
     'giphy' => $giphy,
     'imgur' => $imgur,
     'pexels' => $pexels,
     'istockphoto' => $istockphoto,
     'houzz' => $houzz,
     'dwell' => $dwell,
     'homedepot' => $homedepot,
     'yelp' => $yelp,
     'stackoverflow' => $stackoverflow,
     'stackexchange' => $stackexchange,
     'github' => $github,
     'codepen' => $codepen,
     'sourceforge' => $sourceforge,
     'quora' => $quora,
     'fiverr' => $fiverr,
     'jw' => $jw,
     'bible' => $bible,
     'quran' => $quran,
     'pornhub' => $pornhub,
     'xvideos' => $xvideos,
     'xhamster' => $xhamster,
     'imlive' => $imlive,
  ]);
  
}
   
}
