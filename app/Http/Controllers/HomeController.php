<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

    public function update(Request $request){
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'. $user->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->hasFile('image')){
            $imageName = date('YmdHis') . '.' . $request->image->extension();
            $request->image->move(public_path('images/profile'), $imageName);

            $user->image = $imageName; 
        }
        $user->save();

        return back()->with('profile_updated', 'Profile updated successfully.');
    }
}
