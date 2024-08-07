<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){

        return view('login');
    }
    //login
        public function postLogin(Request $request)
        {
            $data = $request->only('email', 'password');
            if (Auth::attempt($data)) {
                if (Auth::user()->active ==1){
                    return redirect()->route('admin.index')->with('message', 'Login successfully!');
                }else{
                    return redirect()->back()->with('err','Tài khoản bị khóa');
                }
            }
            return redirect()->back()->with('err','Emai or Password is not correct!');
        }
    public function register(){
        return view('register');
    }
    // register
    public function postRegister(Request $request, User $user)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'nullable|image|max:2048',
        ]);
        $data = $request->except('avatar');
        $data['avatar'] = '';
        if ($request->hasFile('avatar')) {
            $path_avatar = $request->file('avatar')->store('avatars');
            $data['avatar'] = $path_avatar;
        }
        $user->query()->create($data);
        return redirect()->route('login')->with('message', 'Register sucessfully!');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
    public function edit(User $user)
    {

        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $old_avt = $user->avatar;
        $data['avatar'] = $old_avt;
        if ($request->hasFile('avatar')) {
            $path_avatar = $request->file('avatar')->store('avts');
            $data['avatar'] = $path_avatar;
        }
        // dd($data);
        $user->update($data);
        if (isset($path_avatar)) {
            if (file_exists('/storage/' . $old_avt)) {
                unlink('/storage/' . $old_avt);
            }
        }
        return redirect()->back()->with('message', 'Update Successfully!');
    }
    public function detail(){
        $user = Auth::user();
        return view('admin.users.detail',compact('user'));
    }
    public function in4update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $old_avt = Auth::user()->avatar;
        $data['avatar'] = $old_avt;
        if ($request->hasFile('avatar')) {
            $path_avatar = $request->file('avatar')->store('avatars');
            $data['avatar'] = $path_avatar;
        }
        $user->update($data);
        if (isset($path_avatar)) {
            if (file_exists('/storage/' . $old_avt)) {
                unlink('/storage/' . $old_avt);
            }
        }
        return redirect()->back()->with('message', 'Update Successfully!');
    }
    public function list(){
        $users=User::orderByDesc('id')->get();
        $g=Genre::all();
        $u= User::count();
        $totals = Genre::count();
        $views = Movie::sum('view');
        $films = Movie::count();
        return view('admin.users.index', compact('users','totals','films','views','g','u'));
    }
    public function destroy(User $user){

        $user->delete();
        return redirect()->back()->with('message','Delete Successfulllly');
    }
    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->active = 1;
        $user->save();
        return redirect()->back()->with('message', 'Tài khoản đã được kích hoạt');
    }

    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->active = 0;
        $user->save();
        return redirect()->back()->with('message', 'Tài khoản đã được bỏ kích hoạt');
    }
    public function change()
    {
        return view('admin.users.changePass');
    }

    public function changePass(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công.');
    }
}
