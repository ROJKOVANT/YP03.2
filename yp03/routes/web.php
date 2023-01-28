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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/help', function () {
    return view('/help');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin', function(){
    return view('admin');
})->middleware('admin');

/*Поиск*/
    //по юзерам
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'getResults'])->name('search.results');
    //по постам
Route::get('/searchTiding', [\App\Http\Controllers\SearchTidingController::class, 'getResults'])->name('searchTiding.results');



/*Профили*/
Route::get('/user/{name}',[\App\Http\Controllers\ProfileController::class, 'getProfile'])->name('profile.index');
Route::get('/profile/edit',[\App\Http\Controllers\ProfileController::class, 'getEdit'])
    ->middleware('auth')->name('profile.edit');
Route::post('/profile/edit',[\App\Http\Controllers\ProfileController::class, 'postEdit'])
    ->middleware('auth')->name('profile.edit');

/*Друзья*/
Route::get('/friends',[\App\Http\Controllers\FriendController::class, 'getIndex'])
    ->middleware('auth')->name('friend.index');
Route::get('/friends/add/{name}',[\App\Http\Controllers\FriendController::class, 'getAdd'])
    ->middleware('auth')->name('friend.add');
Route::get('/friends/accept/{name}',[\App\Http\Controllers\FriendController::class, 'getAccept'])
    ->middleware('auth')->name('friend.accept');
Route::post('/friends/delete/{name}',[\App\Http\Controllers\FriendController::class, 'postDelete'])
    ->middleware('auth')->name('friend.delete');

/*Новости*/
Route::get('/news',[\App\Http\Controllers\NewsController::class, 'getIndex'])
    ->middleware('auth')->name('profile.news');
Route::post('/news',[\App\Http\Controllers\NewsController::class, 'postNews'])
    ->middleware('auth')->name('news.index');
    /*коментарии на новости*/
Route::post('/news/{newsId}/reply',[\App\Http\Controllers\NewsController::class, 'postReply'])
    ->middleware('auth')->name('news.reply');

/*Категории*/
Route::get('/category',[\App\Http\Controllers\CategoryController::class, 'getIndex'])
    ->middleware('auth')->name('profile.category');
Route::post('/category', [\App\Http\Controllers\CategoryController::class, 'postCategory'])
    ->middleware('auth')->name('category.index');
    /*Редактирование профиля*/
/*Новости 2*/
Route::get('/post',[\App\Http\Controllers\PostController::class, 'getIndex'])
    ->middleware('auth')->name('profile.post');
Route::post('/post',[\App\Http\Controllers\PostController::class, 'postPost'])
    ->middleware('auth')->name('post.index');


/*посты Tidings*/
Route::get('/tidings', [App\Http\Controllers\TidingsController::class, 'index'])->name('tidings');
Route::get('/tidings', [App\Http\Controllers\AdminController::class, 'index'])->name('tidings');
Route::get('/tiding/trashed', [App\Http\Controllers\TidingsController::class, 'trashed'])->name('tiding.trashed');
Route::get('/tiding/hdelete/{id}', [App\Http\Controllers\TidingsController::class, 'hdelete'])->name('tiding.hdelete');
Route::get('/tiding/restore/{id}', [App\Http\Controllers\TidingsController::class, 'restore'])->name('tiding.restore');
Route::get('/tiding/edit/{id}', [App\Http\Controllers\TidingsController::class, 'edit'])->name('tiding.edit');
Route::post('/tiding/update/{id}', [App\Http\Controllers\TidingsController::class, 'update'])->name('tiding.update');
Route::get('/tiding/create', [App\Http\Controllers\TidingsController::class, 'create'])->name('tiding.create');
Route::post('/tiding/store', [App\Http\Controllers\TidingsController::class, 'store'])->name('tiding.store');
Route::get('/tiding/delete/{id}', [App\Http\Controllers\TidingsController::class, 'destroy'])->name('tiding.delete');
Route::post('/tiding/{id}/stores', [App\Http\Controllers\CommentsController::class, 'stores'])->name('tiding.stores');
//система коментариев
//Route::post('comments', [App\Http\Controllers\CommentsController::class, 'store']);


/*категории Paragraph*/
Route::get('/paragraphs', [App\Http\Controllers\ParagraphsController::class, 'index'])->name('paragraphs');
Route::get('/paragraph/edit/{id}', [App\Http\Controllers\ParagraphsController::class, 'edit'])->name('paragraph.edit');
Route::get('/paragraph/delete/{id}', [App\Http\Controllers\ParagraphsController::class, 'destroy'])->name('paragraph.delete');
Route::get('/paragraph/create', [App\Http\Controllers\ParagraphsController::class, 'create'])->name('paragraph.create');
Route::post('/paragraph/store', [App\Http\Controllers\ParagraphsController::class, 'store'])->name('paragraph.store');
Route::post('/paragraph/update/{id}', [App\Http\Controllers\ParagraphsController::class, 'update'])->name('paragraph.update');

/*коментарии на посты*/
Route::get('/comment/{id}',[\App\Http\Controllers\CommentController::class, 'getIndex'])
    ->middleware('auth')->name('profile.comment');
Route::post('/comment',[\App\Http\Controllers\CommentController::class, 'postComment'])
    ->middleware('auth')->name('comment.index');
