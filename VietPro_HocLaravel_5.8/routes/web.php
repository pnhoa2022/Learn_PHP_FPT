<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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

Route::get('/', 'PageController@getIndex');

//Truyền tham số mặc định
Route::get('/hello/{name?}', function ($name = 'Default') {
    echo "Hello: " . $name;
});

//Định danh Router
Route::get('/trang-dich', function () {
    echo "Đây là trang đích";
})->name('dich');

Route::get('/trang-nguon', function () {
    //return redirect()->route('dich'); //Cách 1: theo 'name'
    return redirect('/trang-dich'); //Cách 2: theo link
});

//Group Router

Route::group(['prefix' => 'product'], function () {
    Route::get('/', function () {
        echo 'view index';
    });

    Route::get('edit', function () {

        echo 'edit';
    });

    Route::get('add', function () {
        echo 'add';
    });
});


Route::get('/login', 'PageController@getLogin')->name('login');

Route::post('/login', 'PageController@postLogin');

Route::get('/logout', 'PageController@logout')->name('logout');

Route::get('/create-session', function () {
    //Session thường
    session()->put('name', 'Hiếu iceTea');

    //Sesion flash
    session()->flash('flash', 'Sesion flash: chỉ dùng được một lần, sau đó tự động mất');
});

Route::get('/get-session', function () {
    echo session('name');
    echo '<br>';
    echo session('flash');
});

Route::get('/delete-session', function () {
    session()->forget('name'); //xóa 1 hoặc 1 mảng session theo tên

    session()->flush(); //xóa toàn bộ session
});

//Định danh Middleware
Route::get('/middleware-start', function () {
    return "Đây là trang bắt đầu";
})->middleware('Check');

Route::get('/middleware-end', function () {
    return "Đây là trang kết thúc";
});

//Schema
Route::group(['prefix' => 'schema'], function () {
    //Tạo bảng:
    Route::get('create-table', function () {
        Schema::create('users', function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 64);
            $table->string('password', 64);
            $table->tinyInteger('level');
            $table->timestamps();
        });
    });
});

Route::group(['prefix' => 'query'], function () {
    Route::get('insert', function () {

        //Thêm 1 bản ghi:
        DB::table('users')->insert([
            'Email' => 'DinhHieu8896@gmail.com',
            'Password' => 'ahihi',
            'Name' => 'Hieu iceTea',
            'Level' => '1',
        ]);

        //Thêm nhiều bản ghi:
        DB::table('users')->insert([
            [
                'Email' => 'DinhHieu8896@gmail.com',
                'Password' => 'ahihi',
                'Name' => 'Hieu iceTea',
                'Level' => '1',
            ],
            [
                'Email' => 'DinhHieu8896@gmail.com',
                'Password' => 'ahihi',
                'Name' => 'Hieu iceTea',
                'Level' => '1',
            ],
            [
                'Email' => 'DinhHieu8896@gmail.com',
                'Password' => 'ahihi',
                'Name' => 'Hieu iceTea',
                'Level' => '1',
            ]
        ]);

    });

    Route::get('update', function () {
        //Sửa 1 bản ghi:
        DB::table('users')
            ->where('id', '=', '2')
            ->update([
                'Email' => 'update',
                'Password' => 'hoho',
                'Name' => 'Hieu iceTea ne',
                'Level' => '2',
            ]);
    });

    Route::get('delete', function () {
        //Xóa 1 bản ghi:
        DB::table('users')
            ->where('id', '=', '2')
            ->delete();
    });

    Route::get('get', function () {
        //Lấy Data:
        $data = DB::table('users')
            ->get();
        dd($data);
    });

    Route::get('select', function () {
        //Lấy Data:
        $data = DB::table('users')
            ->select('name', 'email')
            ->get();
        dd($data);
    });
});

Route::group(['prefix' => 'model'], function () {
    //Lấy tất cả Data
    Route::get('all', function () {
        $data = App\users::all()->toArray();
        dd($data);
    });

    //Tìm data theo khóa chính
    Route::get('find/{id?}', function ($id = 1) {
        $data = App\users::find($id)->toArray();
        dd($data);
    });

    //Thêm data
    Route::get('insert', function () {
        $data = new App\users;

        $data->name = 'Hiếu iceTea add new';
        $data->email = 'New@gmail.com';

        $data->save();
    });

    //Sửa data
    Route::get('update', function () {
        //$data = App\users::find(12);
        //$data->Name = 'Sửa nè';
        //$data->Email = 'sửa luôn';
        //$data->save(); //Không làm được


        //Phải làm như này
        App\users::where('id', 2)->update([
            'Name' => 'Sửa nè',
            'Email' => 'Sửa luôn'
        ]); //làm được
    });

    //Xóa record
    Route::get('destroy', function () {
        //App\users::find(10)->delete(); //Không làm được
        //App\users::destroy(7); //Không làm được


        //Phải làm như này
        App\users::where('id', 2)->delete(); //làm được
    });
});

//Mã hóa tất cả mật khẩu trong DB
Route::get('conv', function () {
    //echo bcrypt('Hieu8896');

    $users = \App\users::all();
    foreach ($users as $user) {
        echo 'ID: ' . $user->ID;
        \App\users::where('id', $user->ID)->update([
            'Password' => bcrypt('123456'),
        ]);
    }


});


//Liên kết
/***
 * = = = = = = = = = =
 * Liên kết
 * = = = = = = = = = =
 *
 * LK 1-1 Chính -> phụ: HasOne
 * LK 1-1 Phụ -> Chính: BelongsTo
 * LK 1-n: HasMany
 * LK n-n: belongstoMany
 *
 */

Route::get('lien-ket-1-1', function () {
    $users = \App\users::all();

    foreach ($users as $user) {
        echo $user->email . '<br>';
        echo $user->info->address . '<br>';

        echo '<hr>';
    }
});

Route::get('lien-ket-1-n', function () {
    $users = \App\users::all();

    foreach ($users as $user) {
        echo $user->email . '<br>';

        $comments = $user->comment;
        foreach ($comments as $comment) {
            echo $comment->content . '<br>';
        }

        echo '<hr>';
    }
});

//Phân trang
Route::get('phan-trang', 'PageController@getPhanTrang');

//Storage [php artisan storage:link]

Route::get('send-mail', 'PageController@sendMail');
