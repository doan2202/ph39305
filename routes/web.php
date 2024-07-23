<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::view('/about-us', 'about')->name('page.about');
// Route::get('/user', function () {
//     return "LIST USER";
// });

// //duong dan co tham so
// Route::get('/user/{id}', function (int $id) {
//     return "User ID : $id";
// });
// Route::get(
//     '/user/{id}/comment/{comment_id}',
//     function ($id, $comment_id) {
//         return "User ID: $id - Comment ID: $comment_id";
//     }
// )->where('id', '[0-9]+');

// Nhóm đường dẫn theo tiền tố

// Route::prefix('admin')->group(function () {
//     Route::get('/product', function () {
//         return "PRODUCT";
//     });
//     Route::get('/user', function () {
//         return "USER";
//     });
// });

//Query builder
// Route::get ('/post', function(){
    //lay du lieu
    // $post = DB::table('posts')->get();

    //lay 10 ban ghi
    // $post = DB::table('posts')
    // ->select('id','title','view') // lay ra 3 cot la id, title, name
    // ->limit(10)->get();
    //update data
    // DB:: table('posts')
    // ->where('id','=',13)
    // ->update([
    //     'title' => 'Data updated'
    // ]);
    //delete data
    // DB::table('posts')->delete('19');

    //lay ra cac bai viet co luot view > 800
//     $post = DB::table('posts')
//     ->where ('view','>',800)
//     ->get();

//     //Noi 2 bang posts va categories
//     $post =DB::table('posts')
//     ->join('categories', 'cate_id','=', 'categories.id')
//     ->get();

//     return view('postList', compact ('post'));
// });
// Route::get('/category', function(){
//     $category = DB::table('categories')->get();
//     return $category;
// });
// Route::get('/', function () {
//     $low = DB::table('books')
//     ->orderBy('price', 'asc')
//     ->take(8)
//     ->join('categories', 'books.category_id', '=', 'categories.id')
//     ->select('books.*', 'categories.name as category_name')
//     ->get();

// $high = DB::table('books')
//     ->orderBy('price', 'desc')
//     ->take(8)
//     ->join('categories', 'books.category_id', '=', 'categories.id')
//     ->select('books.*', 'categories.name as category_name')
//     ->get();
//     return view('bookList', compact('low', 'high'));
// });
// Route::get('/book/{id}', function($id) {
//     $book = DB::table('books')
//         ->where('id', $id)
//         ->first();

//     return view('detail', compact('book'));
// })->name('detail');
// hiển thị bài viết theo danh mục
Route::get('/category/{id}',function($id){
    $cate = DB::table('books')
    ->where('category_id',$id)->get();
    return view('category', compact('cate'));
});
// Route::prefix('category')->group(function(){
//     Route::get('/list',[CategoryController::class, 'index'])->name('category.index');
//     Route::get('/add', [CategoryController::class, 'create'])->name('category.create');
// });

Route::get('/test', [PostController::class, 'test']);
Route::get('/post/list', [PostController::class, 'index'])->name('post.list');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/edit/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');

