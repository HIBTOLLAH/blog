<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use PHPUnit\Framework\Attributes\Group;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test' , function(){
    return view(view:'test_view');
});
Route::post('/register', ['App\Http\Controllers\RegisteredUserController', 'store'])->name('register');
Route::post('/logout', ['App\Http\Controllers\AuthenticatedSessionController', 'destroy'])->name('logout');
Route :: prefix('/')->group(function(){
    Route:: get('/Main', 'App\Http\Controllers\Web\Main\Main_cont@index')->name('Web.Main');
    Route:: get('/Profile', 'App\Http\Controllers\Auth\Profile_cont@update')->name('Web.Profile');
    Route:: post('/Profile', 'App\Http\Controllers\Auth\Profile_cont@update')->name('Web.Profile');
    Route:: get('/ContectUs', 'App\Http\Controllers\Web\Msg\Msg_cont@send')->name('Web.Msg');
    Route:: post('/ContectUs', 'App\Http\Controllers\Web\Msg\Msg_cont@send')->name('Web.Msg');
    Route::get('/about', function () {return view('Web.Main.About_view');})->name('about');


Route :: prefix('Section')->group(function(){
    Route:: get('/{id}', 'App\Http\Controllers\Web\Section\Section_cont@index')->name('Web.Section.Index');
Route :: prefix('Post')->group(function(){
    Route:: get('/{id}', 'App\Http\Controllers\Web\Post\Post_cont@index')->name('Web.Post.Index');
    Route:: post('/{id}', 'App\Http\Controllers\Web\Post\Post_cont@index')->name('Web.Post.Index');
    Route:: get('/comment/{id}', 'App\Http\Controllers\Web\Post\Post_cont@editComment')->name('Web.Comment.Edit');
    Route:: post('/comment/{id}', 'App\Http\Controllers\Web\Post\Post_cont@editComment')->name('Web.Comment.Edit');
    Route:: get('/comment/delete/{id}', 'App\Http\Controllers\Web\Post\Post_cont@deleteComment')->name('Web.Comment.Delete');


    });

});
});
Route :: prefix('Admin')->middleware('adminpanel')->group(function(){
    Route:: get('/Main', 'App\Http\Controllers\Admin\Main\Main_cont@index')->name('Admin.Main');
Route :: prefix('Section')->middleware('adminrole')->group(function(){
    Route:: get('Add', 'App\Http\Controllers\Admin\Section\Section_cont@add')->name('Section.Add');
    Route:: post('Add', 'App\Http\Controllers\Admin\Section\Section_cont@add')->name('Section.Add');
    Route:: get('/', 'App\Http\Controllers\Admin\Section\Section_cont@index')->name('Section.Index');
    Route:: get('Update/{id}', 'App\Http\Controllers\Admin\Section\Section_cont@update')->name('Section.Update');
    Route:: post('Update/{id}', 'App\Http\Controllers\Admin\Section\Section_cont@update')->name('Section.Update');
    Route:: get('Delete/{id}', 'App\Http\Controllers\Admin\Section\Section_cont@delete')->name('Section.Delete');
    Route:: post('Delete/{id}', 'App\Http\Controllers\Admin\Section\Section_cont@delete')->name('Section.Delete');


});
Route :: prefix('Image')->group(function(){
    Route:: get('/', 'App\Http\Controllers\Admin\Image\Image_cont@index')->name('Image.Index');
    Route:: get('Add', 'App\Http\Controllers\Admin\Image\Image_cont@add')->name('Image.Add');
    Route:: post('Add', 'App\Http\Controllers\Admin\Image\Image_cont@add')->name('Image.Add');
    Route:: get('Delete/{id}', 'App\Http\Controllers\Admin\Image\Image_cont@delete')->name('Image.Delete');
    Route:: post('Delete/{id}', 'App\Http\Controllers\Admin\Image\Image_cont@delete')->name('Image.Delete');
});
Route :: prefix('Post')->group(function(){
    Route:: get('Add', 'App\Http\Controllers\Admin\Post\Post_cont@add')->name('Post.Add');
    Route:: post('Add', 'App\Http\Controllers\Admin\Post\Post_cont@add')->name('Post.Add');
    Route:: get('/', 'App\Http\Controllers\Admin\Post\Post_cont@index')->name('Post.Index');
    Route:: get('Update/{id}', 'App\Http\Controllers\Admin\Post\Post_cont@update')->name('Post.Update');
    Route:: post('Update/{id}', 'App\Http\Controllers\Admin\Post\Post_cont@update')->name('Post.Update');
    Route:: get('Delete/{id}', 'App\Http\Controllers\Admin\Post\Post_cont@delete')->name('Post.Delete');
    Route:: post('Delete/{id}', 'App\Http\Controllers\Admin\Post\Post_cont@delete')->name('Post.Delete');

});
Route :: prefix('Msg')->group(function(){

    Route:: get('/Read/{id}', 'App\Http\Controllers\Admin\Msg\Msg_cont@read')->name('Msg.Read');
    Route:: post('Delete/{id}', 'App\Http\Controllers\Admin\Msg\Msg_cont@delete')->name('Msg.Delete');
    Route:: get('/{type}', 'App\Http\Controllers\Admin\Msg\Msg_cont@index')->name('Msg.Index');

});
Route :: prefix('User')->group(function(){
    Route:: get('Add', 'App\Http\Controllers\Admin\User\User_cont@add')->name('User.Add');
    Route:: post('Add', 'App\Http\Controllers\Admin\User\User_cont@add')->name('User.Add');
    Route:: get('/', 'App\Http\Controllers\Admin\User\User_cont@index')->name('User.Index');
    Route:: get('Update/{id}', 'App\Http\Controllers\Admin\User\User_cont@update')->name('User.Update');
    Route:: post('Update/{id}', 'App\Http\Controllers\Admin\User\User_cont@update')->name('User.Update');
    Route:: get('Delete/{id}', 'App\Http\Controllers\Admin\User\User_cont@delete')->name('User.Delete');
    Route:: post('Delete/{id}', 'App\Http\Controllers\Admin\User\User_cont@delete')->name('User.Delete');

});
});


Route::get('home' , function(){
    return view(view:'home');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
