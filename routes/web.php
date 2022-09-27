<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', [App\Http\Controllers\RootController::class, 'welcome'])->name('welcome');
Route::get('/{username}/', [App\Http\Controllers\RootController::class, 'showprofile'])->name('showprofile');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/user/dashboard', [App\Http\Controllers\UserController::class, 'youserchecker'])->name('dashboard');
});
Route::post('/app/search',[App\Http\Controllers\SearchController::class, 'search_result'])->name('search_result');
Route::get('/app/search',[App\Http\Controllers\SearchController::class, 'search_result'])->name('search_result_get');
Route::get('/app/search/{name}',[App\Http\Controllers\SearchController::class, 'search_result_name'])->name('search_result_name');
Route::get('/app/users', [App\Http\Controllers\RootController::class, 'users'])->name('users');
Route::get('/app/hashtags', [App\Http\Controllers\RootController::class, 'tophashtags'])->name('tophashtags');
Route::get('/app/tags/{name}', [App\Http\Controllers\RootController::class, 'showhashtagcontent']);
Route::get('/app/menu', [App\Http\Controllers\RootController::class, 'menu'])->name('menu');
Route::get('/app/notifications', [App\Http\Controllers\RootController::class, 'notifications'])->name('notifications');
Route::get('/app/articles', [App\Http\Controllers\RootController::class, 'show_articles'])->name('articles');
Route::get('/app/articles/new', [App\Http\Controllers\RootController::class, 'newarticle'])->name('new_article');
Route::post('/app/articles/submit', [App\Http\Controllers\RootController::class, 'submit_article'])->name('article_submit');
Route::get('/app/articles/{slug}', [App\Http\Controllers\RootController::class, 'view_article'])->name('view_article_slug');
Route::get('/articles/{slug}', [App\Http\Controllers\RootController::class, 'view_articlex'])->name('view_article_slugx');
Route::get('/app/worldometers', [App\Http\Controllers\RootController::class, 'worldometers'])->name('worldometers');
Route::get('/app/music', [App\Http\Controllers\RootController::class, 'music'])->name('music');
Route::get('/app/youtubelives', [App\Http\Controllers\RootController::class, 'youtubelives'])->name('youtubelives');
Route::get('/app/lives/{id}/view', [App\Http\Controllers\RootController::class, 'youtubelivesview'])->name('youtubelivesview');
Route::get('/app/nftmarketplace', [App\Http\Controllers\RootController::class, 'nftmarketplace'])->name('nftmarketplace');
Route::get('/app/nfts/{slug}', [App\Http\Controllers\RootController::class, 'view_nft'])->name('view_nft');
Route::get('/{username}/pay/nft/{slug}/{price}', [App\Http\Controllers\PayController::class, 'buynft']);
Route::post('/{username}/pay/nft', [App\Http\Controllers\PayController::class, 'paynft']);
Route::get('/app/products/{slug}', [App\Http\Controllers\RootController::class, 'view_product']);
Route::get('/{username}/shop', [App\Http\Controllers\RootController::class, 'view_user_shop']);
Route::get('/app/translate/{any}', [App\Http\Controllers\RootController::class, 'googletranslate']);
Route::get('/app/{username}/report', [App\Http\Controllers\RootController::class, 'userreports']);
Route::get('/app/close', [App\Http\Controllers\RootController::class, 'close'])->name('close');
Route::get('/app/setting', [App\Http\Controllers\RootController::class, 'setting'])->name('setting');



Route::get('/app/reshare/new', [App\Http\Controllers\RootController::class, 'newreshare'])->name('newreshare');




Route::get('/login/google', [App\Http\Controllers\WebLoginController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [App\Http\Controllers\WebLoginController::class, 'handleCallback']);


// Route::get('/web3-login-message', [App\Http\Controllers\WebLoginController::class, 'message']);
// Route::post('/web3-login-verify', [App\Http\Controllers\WebLoginController::class, 'verify']);



Route::get('/user/dashboard',[App\Http\Controllers\UserController::class, 'youserchecker'])->name('youserchecker');
Route::get('/user/dashboard',[App\Http\Controllers\UserController::class, 'mydashboard'])->name('mydashboard');
Route::get('/user/profile/UpdatePasswordForm',[App\Http\Controllers\UserController::class, 'changepassword'])->name('changepassword');
Route::get('/user/profile/LogoutOtherBrowserSessionsForm',[App\Http\Controllers\UserController::class, 'LogoutOtherBrowserSessionsForm'])->name('LogoutOtherBrowserSessionsForm');
Route::get('/user/profile/TwoFactorAuthenticationForm',[App\Http\Controllers\UserController::class, 'TwoFactorAuthenticationForm'])->name('TwoFactorAuthenticationForm');
Route::get('/user/profile/DeleteUserForm',[App\Http\Controllers\UserController::class, 'DeleteUserForm'])->name('DeleteUserForm');
Route::post('/app/user/reaction/{react}/{id}', [App\Http\Controllers\UserController::class, 'articlereactionpost']);
Route::post('/user/comment/a/{id}',[App\Http\Controllers\UserController::class, 'sendcommentforarticle'])->name('sendcommentforarticle');
Route::get('/user/follow/hashtags',[App\Http\Controllers\UserController::class, 'user_hashtags_wall'])->name('user_hashtags_wall');
Route::get('/user/follow/users',[App\Http\Controllers\UserController::class, 'user_connections_wall'])->name('user_connections_wall');
Route::get('/user/{username}/follow', [App\Http\Controllers\UserController::class, 'follow_user']);
Route::get('/user/{username}/unfollow', [App\Http\Controllers\UserController::class, 'unfollow_user']);
Route::get('/user/tags/{name}/follow', [App\Http\Controllers\UserController::class, 'followhashtag']);
Route::get('/user/tags/{name}/unfollow', [App\Http\Controllers\UserController::class, 'unfollowhashtag']);
Route::get('/user/articles/edit/{slug}', [App\Http\Controllers\UserController::class, 'edit_article'])->name('edit_article');
Route::put('/user/articles/update/{slug}/', [App\Http\Controllers\UserController::class, 'submiteditform_article'])->name('submiteditform');
Route::delete('/user/articles/delete/{slug}', [App\Http\Controllers\UserController::class, 'delete_article'])->name('delete_article');
Route::get('/user/nft/add/{slug}', [App\Http\Controllers\UserController::class, 'add_nft'])->name('nftarticle');
Route::post('/user/nft/submit/{slug}',[App\Http\Controllers\UserController::class, 'add_nft_submit'])->name('add_nft_submit');
Route::get('/user/transactions',[App\Http\Controllers\UserController::class, 'transactions'])->name('transactions');
Route::get('/app/transactions/{any}', [App\Http\Controllers\UserController::class, 'transactionsany'])->name('transactionsany');
Route::get('/{username}/nfts/sendoffer/{slug}', [App\Http\Controllers\UserController::class, 'sendoffer']);
Route::post('/user/nfts/sendoffer/{slug}', [App\Http\Controllers\UserController::class, 'sendofferpost']);
Route::get('/app/notes', [App\Http\Controllers\UserController::class, 'notes'])->name('notes');
Route::get('/user/notes/add',[App\Http\Controllers\UserController::class, 'addnewnote'])->name('addnewnote');
Route::post('/user/note/submit',[App\Http\Controllers\UserController::class, 'addnewnotesubmit'])->name('addnewnotesubmit');
Route::get('/user/note/{slug}',[App\Http\Controllers\UserController::class, 'noteview'])->name('noteview');
Route::put('/user/notes/edit/{slug}/', [App\Http\Controllers\UserController::class, 'editnote'])->name('editnote');
Route::delete('/user/notes/delete/{slug}', [App\Http\Controllers\UserController::class, 'delete_note'])->name('delete_note');
Route::get('/user/setting/index',[App\Http\Controllers\UserController::class, 'settingindex'])->name('settingindex');
Route::get('/user/products',[App\Http\Controllers\UserController::class, 'userhomeshopindex'])->name('userhomeshopindex');
Route::get('/user/products/new',[App\Http\Controllers\UserController::class, 'newproduct'])->name('newproduct');
Route::post('/user/products/submit', [App\Http\Controllers\UserController::class, 'submitproduct']);
Route::delete('/user/products/delete/{slug}', [App\Http\Controllers\UserController::class, 'delete_product'])->name('delete_product');
Route::get('/user/products/orders',[App\Http\Controllers\UserController::class, 'orders'])->name('orders');
Route::get('/user/products/reject/{slug}',[App\Http\Controllers\UserController::class, 'rejectorder'])->name('rejectorder');
Route::get('/user/products/accept/{slug}',[App\Http\Controllers\UserController::class, 'acceptorder'])->name('acceptorder');
Route::post('/user/products/accept/delivery',[App\Http\Controllers\UserController::class, 'acceptorderpost'])->name('acceptorderpost');
Route::get('/app/messages/{any}', [App\Http\Controllers\UserController::class, 'showmessage'])->name('showmessage');
Route::post('/app/messages/deliveryproblem', [App\Http\Controllers\UserController::class, 'deliveryproblemanswermessage'])->name('deliveryproblemanswermessage');




Route::get('/sys/information',[App\Http\Controllers\OfficeController::class, 'information'])->name('information');
Route::get('/sys/about',[App\Http\Controllers\OfficeController::class, 'about'])->name('about');
Route::get('/sys/contact',[App\Http\Controllers\OfficeController::class, 'contact'])->name('contact');
Route::get('/sys/rules',[App\Http\Controllers\OfficeController::class, 'rules'])->name('rules');



Route::get('/x/admin',[App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/x/admin/feeds',[App\Http\Controllers\AdminController::class, 'adminaddnewfeed'])->name('adminaddnewfeed');
Route::post('/x/admin/feed',[App\Http\Controllers\AdminController::class, 'adminaddnewfeedform'])->name('adminaddnewfeedform');
Route::delete('/x/admin/feed/{id}', [App\Http\Controllers\AdminController::class, 'admindeletefeed'])->name('admindeletefeed');


Route::get('/x/feedreader/{id}', [App\Http\Controllers\AutomaticController::class, 'feedreader']);
Route::get('/x/gtrend', [App\Http\Controllers\AutomaticController::class, 'gtrend']);


// Route::get('/sitemap.xml',[App\Http\Controllers\SiteMapController::class, 'index'])->name('sitemapindex');
// Route::get('/sitemap/users.xml',[App\Http\Controllers\SiteMapController::class, 'users'])->name('userssitemap');
// Route::get('/sitemap/articles.xml',[App\Http\Controllers\SiteMapController::class, 'articles'])->name('articlessitemap');
// // Route::get('/sitemap/searchs.xml',[App\Http\Controllers\SiteMapController::class, 'searchs'])->name('searchssitemap');
