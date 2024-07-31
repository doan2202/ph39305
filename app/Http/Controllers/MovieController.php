<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('id', 'desc')->paginate(10);

        return view('movie.index', compact('movies'));
    }
    public function create()
    {
        $genres = Genre::all();
        return view('movie.create', compact('genres'));
    }
    public function store(Request $request){
        $data = $request->except('_token','poster');
        $data['poster']=''; // truong hop k nhap anh

        //neu nguoi dung nhap anh
        if($request->hasFile('poster')){
            $path_image=$request->file('poster')->store('images');
            $data['poster']=$path_image;

        }
        //luu du lieu vao database
            Movie::query()->create($data);

            return redirect()->route('movie.index')->with('message','Add Successfully!');
    }
    public function destroy(Movie $movie){
        $movie->delete();
        return redirect()->route('movie.index')->with('message','Delete Successfully!');
    }
    public function edit(Movie $movie){
        $genres=Genre::all();
        return view('movie.edit', compact('genres','movie'));
    }
    public function update(Request $request, Movie $movie){
        $data=$request->except('poster');
        $old_poster=$movie->poster;
        $data['poster']=$old_poster;
        if($request->hasFile('poster')){
            $path_img=$request->file('poster')->store('posters');
            $data['poster']=$path_img;
        }
        $movie->update($data);
        if(isset($path_img)){
            if(file_exists('/storage/'.$old_poster)){
                unlink('/storage/'.$old_poster);
            }
        }
        return redirect()->back()->with('message','Update Successfully!');
    }
    public function detail(Movie $movie){
        $genres=Genre::all();
        return view('movie.detail', compact('movie','genres'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');


        $movies = Movie::where('title', 'like', '%' . $query . '%')
        ->paginate(10);

        return view('movie.index', compact('movies', 'query'));
    }
}
