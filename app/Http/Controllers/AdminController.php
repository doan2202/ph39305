<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()

    {
        $user = Auth::user();
        $movies = Movie::orderBy('id', 'desc')->paginate(10);
        $g=Genre::all();
        $user = Auth::user();
        $u= User::count();
        $totals = Genre::count();
        $views = Movie::sum('view');
        $films = Movie::count();
        return view('admin.index', compact('movies', 'totals', 'views', 'films','g','u','user'));
    }
    public function mindex(Genre $genre)
    {
        $g=Genre::all();
        $u= User::count();
        $user = Auth::user();
        $movies = Movie::where('genre_id',$genre->id)->paginate(10);
        $totals = Genre::count();
        $views = Movie::sum('view');
        $films = Movie::count();
        return view('admin.index', compact('movies', 'totals', 'views', 'films','g','u','user'));

    }
    public function gindex(){
        $genres = Genre::all();
        // dd($genres);
        $totals = Genre::count();
        $u= User::count();
        $views = Movie::sum('view');
        $films = Movie::count(); $g=Genre::all();
        return view('admin.genres.index', compact('genres','totals', 'views', 'films','g','u'));
    }
    public function create()
    {
        $genres = Genre::all();
        return view('admin.create', compact('genres'));
    }
    public function gcreate()
    {
        return view('admin.genres.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'required|image|max:2048',
            'intro' => 'required|string|max:500',
            'release_date' => 'required|date',
        ]);
        $data = $request->except('_token', 'poster');
        $data['poster'] = ''; // truong hop k nhap anh

        //neu nguoi dung nhap anh
        if ($request->hasFile('poster')) {
            $path_image = $request->file('poster')->store('images');
            $data['poster'] = $path_image;
        }
        //luu du lieu vao database
        Movie::query()->create($data);

        return redirect()->route('admin.index')->with('message', 'Add Successfully!');
    }
    public function gstore(Request $request)
    {
        $data = $request->except('_token');

        Genre::query()->create($data);

        return redirect()->route('g.index')->with('message', 'Add Successfully!');
    }
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.index')->with('message', 'Delete Successfully!');
    }
    public function gdestroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('g.index')->with('message', 'Delete Successfully!');
    }
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('admin.edit', compact('genres', 'movie'));
    }
    public function gedit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'))->with('message', 'Update Successfully!');
    }
    public function update(Request $request, Movie $movie)
    {
        $data = $request->except('poster');
        $old_poster = $movie->poster;
        $data['poster'] = $old_poster;
        if ($request->hasFile('poster')) {
            $path_img = $request->file('poster')->store('posters');
            $data['poster'] = $path_img;
        }
        $movie->update($data);
        if (isset($path_img)) {
            if (file_exists('/storage/' . $old_poster)) {
                unlink('/storage/' . $old_poster);
            }
        }
        return redirect()->back()->with('message', 'Update Successfully!');
    }
    public function gupdate(Request $request, Genre $genre)
    {
        $data = $request->all();

        $genre->update($data);
        return redirect()->back()->with('message', 'Update Successfully!');
    }
    public function detail(Movie $movie)
    {
        $genres = Genre::all();
        return view('admin.detail', compact('movie', 'genres'));
    }
    public function search(Request $request)
    {
        $user=Auth::user();
        $query = $request->input('query');
        $movies = Movie::where('title', 'like', '%' . $query . '%')
            ->paginate(10);
            $g=Genre::all();
            $u=User::count();
            $totals = Genre::count();
            $views = Movie::sum('view');
            $films = Movie::count();
            return view('admin.index', compact('movies', 'totals', 'views', 'films','g','u','user'));
    }
}
