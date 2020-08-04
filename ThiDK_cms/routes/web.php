<?php

use Illuminate\Support\Facades\Route;

use App\Note;

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

Route::get('/About', function () {
    return "About";
});

Route::get('/About/Detail', array('as' => 'Detail', function () {
    return "About/Detail";
}));

Route::get('/Login', function () {
    return "Login";
});

Route::get('/User/{name}', function ($name) {
    return "Xin chao: " . $name;
});

Route::get('/ThuThach/{price}/{art}', function ($price, $art) {
    return $price . " " . $art;
});

Route::get('where', function () {
    return Redirect::route('Detail');
});

Route::get('testController', 'TestController@show');

Route::get('testController/{name}', 'TestController@showDetail');

Route::get('/testView', function () {
    return view('testView');
});

Route::get('profile/{name}', 'ProfileController@show');


Route::get('testInsert', function () {
    \Illuminate\Support\Facades\DB::insert('INSERT INTO Note (Title, Content) VALUES (?, ?);', ['Tieu de', 'Noi dung']);
    return 'Done';
});


Route::get('testSelectAll', function () {
    $result = \Illuminate\Support\Facades\DB::select('SELECT * FROM Note;');
    return $result;
});

Route::get('testUpdate', function () {
    $result = \Illuminate\Support\Facades\DB::update('UPDATE Note SET Title = "New title" WHERE IDNote = ?;', [1]);
    return 'Số bản ghi bị ảnh hưởng: ' . $result;
});

Route::get('readAll', function () {
    $Notes = Note::all();
    foreach ($Notes as $Note) {
        echo $Note->Title . ": " . $Note->Content;
        echo "<br>";
    }
});

Route::get('findID/{IDNote}', function ($IDNote) {
    //$Notes = Note::where('IDNote', $IDNote)->get();
    $Notes = Note::where('IDNote', '=', $IDNote)->get();

    //$Notes = Note::all()->where('IDNote', $IDNote);

    foreach ($Notes as $Note) {
        echo $Note->Title . ": " . $Note->Content;
        echo "<br>";
    }
});

Route::get('insert', function () {
    $Note = new Note();
    $Note->Title = 'insert Title';
    $Note->Content = 'insert Content';

    $Note->save();

    echo 'insert!';
});


Route::get('update', function () {
    $Note = Note::where('ID', 1)->first();
    $Note->Title = 'update Title 1';
    $Note->Content = 'update Content 1';

    $Note->save();

    echo 'update!'; //KHÔNG ĐƯỢC
});

Route::get('update2', function () {
    Note::where('ID', 1)
        ->update(['Title' => 'update 2']);

    echo 'update 2 !';
});

Route::get('delete', function () {
    Note::where('id', 2)
        ->delete();


    //Note::destroy([2]); //KHÔNG ĐƯỢC
});
