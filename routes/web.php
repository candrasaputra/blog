<?php

use App\Post;

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
    return redirect('/about');
});

Route::get('/about', function() {
	return 'Haii';
});

Route::get('/blog', 'PostController@index');
// Route::get('/post/create', 'PostController@create');
// Route::get('/post/store', 'PostController@store');

// Route::get('/post/{id}', ['as' => 'post.detail', function($id) {
// 	echo "Post ".$id;
// 	echo "<br/>";
// 	echo "Body post in ID ".$id;
// }]);

Route::resource('post', 'PostController');

Route::get('/insert', function() {
	// DB::insert('insert into posts(title, body, user_id) values (?, ?, ?)', ['Belajar PHP denga laravel', 'Laraverl is awseome!', '1']);
    $data = [
        'title' => 'Disini di isi title',
        'body' => 'Disini di isi body',
        'user_id' => '2'
    ];

    DB::table('posts')->insert($data);
    echo "data berhasil dibuat!";
});

Route::get('/read', function() {
    // $query = DB::select('select * from posts where id=?', [1]);
    $query = DB::table('posts')->where('id', 1)
                                ->first();

    return var_dump($query);
});

Route::get('/delete', function() {
    // $delete = DB::delete('delete from posts where id = ?', [1]);

    $delete = DB::table('posts')->where('id', 2)->delete();
    return $delete;
});

Route::get('/posts', function (){
    $posts = Post::all();
    return $posts;
});

Route::get('/find', function (){
    $post = Post::find(5);
    return $post;
});

Route::get('/findWhere', function (){
    $post = Post::where('user_id', 2)
                    ->orderBy('id', 'desc')
                    ->take(1)
                    ->get();
    return $post;
});

Route::get('/create', function (){
    $post = new post();
    $post->title = 'Isi Judul';
    $post->body = 'Isi body';
    $post->user_id = 3;
    
    $post->save();
});

Route::get('/createpost', function (){
    $post = Post::create([
        'title' => 'Create Data dari method create',
        'body' => 'Kita isi dengan isian post',
        'user_id' => 1
    ]);
});

Route::get('/updatepost', function (){
    $post = Post::where('id', 5);
    $post->update([
        'title' => 'Update Data id 5 dari method create',
        'body' => 'Kita isi dengan isian post yg telah di update',
        'user_id' => 5
    ]);
});

Route::get('/deletepost', function (){
    // $post = Post::find(4);
    // $post->delete();

    // Post::destroy([3,6,7]);

    $post = Post::where('user_id', 3);
    $post->delete();
});