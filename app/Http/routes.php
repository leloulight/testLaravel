<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

class Page extends Illuminate\Database\Eloquent\Model{

    public $timestamps = false;

    protected $table = 'pages';

    protected $fillable = ['id', 'name', 'number'];
}

Route::get('/', 'WelcomeController@index');

Route::get('/page/{wildcard}', function($wildcard) {
    $page = new Page;


    $page->name = "rrrr";
    $page->number = $wildcard;

    $page->save();

    return view('page', ['wildcard' => $wildcard]);
})-> where('wildcard','[0-9]+');
