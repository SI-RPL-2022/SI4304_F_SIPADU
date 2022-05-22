<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        return view('home', $data);
    }

    public function profil(Request $request)
    {
        
        $user = User::find(Auth::user()->id);

        $data = [
            'title' => 'Profil',
            'user' => $user
        ];

        if ($request->segment(2) == 'edit') {
            if ($request->segment(3) == 'submit') {
                $userEmail = User::where('email', $request->email)->where('id', '!=', Auth::user()->id)->first();
                if($userEmail){
                    $request->session()->flash('alert', 'danger');
                    $request->session()->flash('message', 'Email telah digunakan!');
                    return redirect()->back();
                }
                $user->email = $request->email;
                $user->address = $request->address;
                $user->phone = $request->phone;
                if($request->password != null){
                    if($request->password == $request->password_confirmation){
                        $user->password = Hash::make($request->password);
                    }else {
                        $request->session()->flash('alert', 'danger');
                        $request->session()->flash('message', 'Password konfirmasi tidak sesuai!');
                        return redirect()->back();
                    }
                }
                $user->save();

                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'User Berhasil Diubah!');
                return redirect()->to(route('profil'));
            }
            return view('profil.edit', $data);
        }

        return view('profil.index', $data);
    }
}
