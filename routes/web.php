<?php


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageUploadController;
// use App\Models\Article;
// use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::redirect('/', '/articles');

// Route::get('/post/{post}', [PostController::class, 'show']);

// TODO: voor een volgende keer zou ik een Route::resource gebruiken die alle routes voor 1 entiteit automatisch aanmaakt

Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name("comments.store");

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');

Route::get('/article/premium', [ArticleController::class, 'premium'])->name('article.premium');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('Articles.update');

Route::put('/articless/{article}', [ArticleController::class, 'update'])->name('articles.update');

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

Route::get('/articles/comments', [CommentController::class, 'create'])->name('articles.comments');

//User Login Signup Zone
Route::get('/post/{post}', [PostController::class, 'show']);

Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/login', [AuthController::class, 'show'])->name('login.show');

Route::post('/login', [AuthController::class, 'login'])->name('login.post'); 

Route::get('registration', [AuthController::class, 'registration'])->name('register');

Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

Route::get('dashboard', [AuthController::class, 'dashboard']); 

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/upload', [ImageUploadController::class, 'showForm'])->name('image.form');

Route::post('/upload', [ImageUploadController::class, 'upload'])->name('image.upload');

Route::get('/images', [ImageUploadController::class, 'listImages'])->name('images.list');

// Route::resource('users', UserController::class)->only(['index', 'edit','update', 'togglepremium']);

Route::post('/users/toggle-premium', [UserController::class, 'togglePremium'])->name('users.togglepremium'); 


// todo: voeg update route naar usercontroller toe