<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\GoogleCalendar\Event;


Auth::routes();
/*Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');*/
Route::get('/',function()
{
    $event = new Event;
    Event::create([
        'name' => 'A new event',
        'startDateTime' => Carbon\Carbon::now(),
        'endDateTime' => Carbon\Carbon::now()->addHour(),
    ]);


//    $e=e[0];
//    dd($e->startDateTime->toDateTimeString());
    dd($event);
});
Route::get('/homet', 'App\Http\Controllers\HomeController@indext')->name('homet');


Route::middleware('auth')->group(function() {
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');
    Route::post('/comment/store', 'App\Http\Controllers\CommentController@store')->name('comment.add');
    Route::post('/reply/store', 'App\Http\Controllers\CommentController@replyStore')->name('reply.add');
});
