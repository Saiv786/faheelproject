<?php

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
    return view('under_construction');
    return redirect(route('login'));
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', function () {
        return view('pages.profile');
    })->name('profile');
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    Route::get('/campaigns', function () {
        return view('campaigns.index');
    })->name('campaigns');
    Route::get('/contacts', 'ContactListController@index')->name('contacts');
    Route::resource('contacts','ContactListController')->except(['index']);
    Route::get('/schedules', function () {
        return view('schedules.index');
    })->name('schedules');
    Route::get('/schedules/create', function () {
        return view('schedules.create');
    })->name('schedules.create');
    Route::get('/activity_logs', function () {
        return view('activity_logs');
    })->name('activity_logs');
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/templates', function () {
    //     return view('templates.index', [
    //         'templates' => collect([]),
    //     ]);
    // })->name('t_index');


    // Template
    Route::post('templates/{uid}/copy', 'TemplateController@copy');
    Route::get('templates/{uid}/copy', 'TemplateController@copy');
    Route::get('templates/{uid}/content', 'TemplateController@content');
    Route::get('templates/sort', 'TemplateController@sort');
    Route::get('templates/listing/{page?}', 'TemplateController@listing');
    Route::get('templates/choosing/{campaign_uid}/{page?}', 'TemplateController@choosing');
    Route::get('templates/upload', 'TemplateController@upload');
    Route::post('templates/upload', 'TemplateController@upload');
    Route::get('templates/{uid}/image', 'TemplateController@image');
    Route::post('templates/{uid}/saveImage', 'TemplateController@saveImage');
    Route::get('templates/{uid}/preview', 'TemplateController@preview');
    Route::get('templates/delete', 'TemplateController@delete');
    Route::get('templates/build/select', 'TemplateController@buildSelect');
    Route::get('templates/build/{style?}', 'TemplateController@build');
    Route::get('templates/{uid}/rebuild', 'TemplateController@rebuild');
    Route::resource('templates', 'TemplateController');
    Route::get('templates/{uid}/edit', 'TemplateController@edit');
    Route::patch('templates/{uid}/update', 'TemplateController@update');
});
Route::get('send_mail', function () {
    $x = Mail::to('moeezghauri786@gmail.com')->send(new \App\Mail\BasicMail(['body' => 'It works!'], 'noor'));
    \Log::debug($x);
    echo $x;
});
Auth::routes();
// Translation data
Route::get('/datatable_locale', 'Controller@datatable_locale');
Route::get('/jquery_validate_locale', 'Controller@jquery_validate_locale');
