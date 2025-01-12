<?php

namespace App\Http\Controllers;

use App\Models\ActivityResult;
use Illuminate\Http\Request;
use App\Models\User;

class ActivityResultController extends Controller
{
    public function index()
    {
        $datas = ActivityResult::paginate();
        return view('activity_result.manage', compact('datas'));
    }

    public function edit($id)
    {
        $data = ActivityResult::findOrFail($id);
        $users = User::all();

        return view('activity_result.edit', compact('data', 'users'));
    }

    public function destroy($id)
    {
        ActivityResult::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function create()
    {
        $users = User::all();

        return view('activity_result.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);
        ActivityResult::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'activity_type' => $request->activity_type
            ],
            $request->all()
        );
        return redirect()->route('home');

    }

    public function update(Request $request, $id)
    {
        ActivityResult::findOrFail($id)->update($request->all());
        return redirect()->route('activity_result.index')
            ->with('success', 'ActivityResult Successfully Updated');
    }

    public function show($id)
    {
        $data = ActivityResult::findOrFail($id);
        return view('activity_result.show', compact('data'));
    }
}
