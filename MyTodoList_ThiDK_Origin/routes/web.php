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

use App\Task;
use Illuminate\Http\Request;

//Route::get('/', function () {
//    return view('welcome');
//});

/**
 * Show task Dashboard
 */
Route::get('/', function () {

    $tasks = Task::where('Enabled', TRUE)->orderBy('Created_At', 'desc')->get();

    return view('tasks', [
        'tasks' => $tasks,
    ]);
});

/**
 * Add new task
 */
Route::post('/task', function (Request $request) {
    //Validate information
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')->withInput()->withErrors($validator);
    }

    $task = new Task();

    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * Delete task
 */
Route::delete('/task/{ID}', function ($ID) {
    //Task::findOrFail($ID)->delete();

    //Task::where('ID', $ID)->delete();

    Task::where('ID', $ID)->update(['Enabled' => FALSE]);

    return redirect('/');
});
