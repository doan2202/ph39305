<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function test()
    {
        //Lấy ra toàn bộ dữ liệu
        // $posts= Post::all();
        // return $posts;

        //Lay du lieu co dieu kien
        // $posts=Post::query()->where('cate_id',1)->get();
        // return $posts;

        //Tim du lieu gan dung
        // $posts=Post::query()->where('title', 'LIKE', '%neq%')->get();

        //Su dung sum,avg,count
        // $sum= Post::query()->average('view');
        // return $sum;

        //Them, sua
        //C1:Dung mang
        // $data = [
        //     'title'=> fake()->text(25),
        //     'image'=>fake()->imageUrl(),
        //     'description'=>fake()->text(30),
        //     'content'=>fake()->paragraph(),
        //     'view'=>rand(1,1000),
        //     'cate_id'=>rand(1,4)
        // ];
        // Post::query()->create($data);

        // // 2. su dung doi tuong
        // $post=new Post();
        // $post->title=fake()->text(25);
        // $post->image=fake()->imageUrl();
        // $post->description=fake()->text(30);
        // $post->content=fake()->paragraph();
        // $post->view=rand(1,1000);
        // $post->cate_id=rand(1,4);
        // $post->save();

        //sua
        Post::query()->find(110)->update([
            'title'=>'update'
        ]);
        $posts = Post::orderByDesc('id')->get();
        return $posts;
    }
    public function index() {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts', compact('posts'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }
    public function store(Request $request){
        $data = $request->except('_token','image');
        $data['image']=''; // truong hop k nhap anh

        //neu nguoi dung nhap anh
        if($request->hasFile('image')){
            $path_image=$request->file('image')->store('images');
            $data['image']=$path_image;
        }

        //luu du lieu vao database
            Post::query()->create($data);
            return redirect()->route('post.list')->with('message','Add Successfully!');

    }
    public function destroy($post){
        Post::destroy($post);
        return redirect()->route('post.list')->with('message','Delete Successfully!');
    }
}
