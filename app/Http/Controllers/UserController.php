<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == "lecturer") {
            $datas = User::where("role", "student")->paginate();
        } else {
            $datas = User::paginate();
        }

        return view('user.manage', compact('datas'));
    }

    public function edit($id)
    {
        $data = User::find($id)->toArray();

        return view('user.edit', compact('data'));
    }

    public function destroy($user)
    {
        User::find($user)->delete();

        return response()->json(['success' => true]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'password' => 'password'
        ]);

        User::create($request->all());

        return redirect()->route('user.index')
            ->with('success', "User Successfully Added");
    }

    public function update(Request $request, $user)
    {
        User::find($user)->update($request->all());

        return redirect()->route('user.index')
            ->with('success', "User Successfully Updated");
    }

    public function show($id)
    {
        $data = User::find($id)->toArray();

        return view('user.show', compact('data'));
    }

    public function profile()
    {
        return view('auth.user-profile');
    }

    public function profileUpdate(Request $request)
    {
        if ($request->password != $request->confirm_password) {
            return redirect()->back()->with('error', 'New password and confirm password does not match. Please try again.');
        }
        
        User::find(auth()->user()->id)->update($request->all());
        return redirect()->back()->with('success', 'Profile successfully updated!');
    }
}
