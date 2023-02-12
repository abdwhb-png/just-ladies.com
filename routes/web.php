<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('/');
Route::get('/test', [App\Http\Controllers\MainController::class, 'test'])->name('/test');
Route::get('girls/{name}/{id}', [App\Http\Controllers\MainController::class, 'girls'])->name('girls/{name}/{id}');
Route::get('{name}/{id}/gallery', [App\Http\Controllers\MainController::class, 'gallery'])->name('gallery');
Route::get('vue-carousel', [App\Http\Controllers\MainController::class, 'vueCarousel'])->name('vue-carousel');
Route::get('girls-results', [App\Http\Controllers\MainController::class, 'girlsResults'])->name('girls-results');
Route::get('girl-gallery/{id}', [App\Http\Controllers\MainController::class, 'girlGallery'])->name('girl-gallery/{id}');
Route::get('girl-infos/{id}', [App\Http\Controllers\MainController::class, 'girlInfos'])->name('girl-infos/{id}');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('can:gest-users', 'auth')->group(function () {
    //UsersManagement
    Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function() {
        Route::resource('users', UsersController::class);
        Route::resource('members', MembersController::class);
        Route::resource('escorts', EscortsController::class);
    });

    //Admin
    Route::get('/admin', [App\Http\Controllers\MainController::class, 'admin'])->name('admin');
    Route::get('/livesearch', [App\Http\Controllers\Admin\UsersController::class, 'getUsers']);
    Route::get('/admin/escorts/get-prenom/{x}', [App\Http\Controllers\Admin\EscortsController::class, 'getPrenom']);
    Route::get('admin/escorts/get-girls/{nbr}', [App\Http\Controllers\Admin\EscortsController::class, 'getGirls']);
    Route::get('/admin/get-chatters', [App\Http\Controllers\Admin\UsersController::class, 'getChatters']);
    Route::get('/admin/get-contacts/{id}', [App\Http\Controllers\Admin\UsersController::class, 'getContacts']);
    Route::get('/admin/conversations/{chatter_id}/{target_id}', [App\Http\Controllers\Admin\UsersController::class, 'getConversations'])->name('admin.conversations');
    Route::delete('/admin/conversations/deleteMessage/{msg_id}/{chatter_id}', [App\Http\Controllers\Admin\UsersController::class, 'deleteMessage'])->name('admin.conversations.deleteMessage');
    Route::put('/admin/reset/password/{user_id}', [App\Http\Controllers\Admin\UsersController::class, 'resetPassword'])->name('admin.reset.password');
    Route::get('/api/user', [App\Http\Controllers\Admin\UsersController::class, 'searchUser']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');

    Route::namespace('App\Http\Controllers\Users')->prefix('users')->name('users.')->group(function() {
        Route::resource('member', MembersController::class);
        Route::middleware('can:escort-user')->group(function () {
            Route::resource('escort', EscortsController::class);
        });
    });
    
    Route::post('/users/escort/profilepic/{escort}',
     [App\Http\Controllers\Users\EscortsController::class, 'updateProfilePic'])->name('users.escort.profilepic');
    Route::post('/users/escort/{escort}/gallery', [App\Http\Controllers\Users\EscortsController::class, 'storeFiles'])->name('users.escort.gallery');
    Route::delete('/users/escort/{escort}/deleteimg/{image}', [App\Http\Controllers\Users\EscortsController::class, 'destroyImg'])->name('users.escort.deleteimg');
});


//Site Pages
Route::get('/members-registration', [App\Http\Controllers\MembersController::class, 'register'])->name('members-registration');
Route::put('/members-registration', [App\Http\Controllers\MembersController::class, 'error'])->name('members-registration');
Route::get('/tarifs', [App\Http\Controllers\MainController::class, 'tarifs'])->name('tarifs');
Route::get('/contact', [App\Http\Controllers\MainController::class, 'contact'])->name('contact');
Route::get('/conditions-generales', [App\Http\Controllers\MainController::class, 'conditionsGenerales'])->name('conditions-generales');
Route::get('/confidentialite', [App\Http\Controllers\MainController::class, 'confidentialite'])->name('confidentialite');
Route::get('/fonctionnement', [App\Http\Controllers\MainController::class, 'fonctionnement'])->name('fonctionnement');
Route::get('/faq', [App\Http\Controllers\MainController::class, 'faq'])->name('faq');
Route::get('/our-values', [App\Http\Controllers\MainController::class, 'ourValues'])->name('our-values');
Route::get('/who-are-we', [App\Http\Controllers\MainController::class, 'whoAreWe'])->name('who-are-we');
Route::get('/become-escort', [App\Http\Controllers\MainController::class, 'becomeEscort'])->name('become-escort');
Route::get('/escorts-casting', [App\Http\Controllers\MainController::class, 'escortsCasting'])->name('escorts-casting');
Route::get('/testimonials', [App\Http\Controllers\MainController::class, 'testimonials'])->name('testimonials');
Route::get('/escort-glossary', [App\Http\Controllers\MainController::class, 'escortGlossary'])->name('escort-glossary');
Route::get('/community/member', [App\Http\Controllers\MainController::class, 'communityMember'])->name('community/member');
Route::get('/blog', [App\Http\Controllers\MainController::class, 'blog'])->name('blog');

