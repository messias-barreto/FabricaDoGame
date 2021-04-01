<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SecoundCommentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ArticleController::class, 'favorite']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/article/{id}', [ArticleController::class, 'show']);

Route::get('/cadarticle', [ArticleController::class, 'create']);
Route::get('/configurearticle/{id}', [ArticleController::class, 'configurearticle']);

Route::post('/cadarticle', [ArticleController::class, 'store'])->name('addArticle');

Route::get('/updatearticle/{id}', [ArticleController::class, 'edit']);
Route::put('/updatearticle/{id}', [ArticleController::class, 'update'])->name('updateArticle');

Route::post('/cadcomment', [CommentController::class, 'store'])->name('addComment');

Route::get('/secoundarycomment/comment', [SecoundCommentController::class, 'index']);
Route::post('/cadsecoundarycomment', [SecoundCommentController::class, 'store'])->name('addSecoundaryComment');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if( Auth::user()->level >= 2)
        return view('dashboard');
    else{
        return redirect()->action([ArticleController::class, 'favorite']);
    }
})->name('dashboard');
