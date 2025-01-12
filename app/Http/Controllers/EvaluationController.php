<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Models\User;

class EvaluationController extends Controller
{
    public function index()
    {
        $datas = Evaluation::paginate();
        return view('evaluation.manage', compact('datas'));
    }

    public function edit($id)
    {
        $data = Evaluation::findOrFail($id);
        $users = User::all();

        return view('evaluation.edit', compact('data', 'users'));
    }

    public function destroy($id)
    {
        Evaluation::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function create()
    {
        $users = User::all();

        return view('evaluation.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);
        Evaluation::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
            ],
            $request->all()
        );
        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        Evaluation::findOrFail($id)->update($request->all());
        return redirect()->route('evaluation.index')
            ->with('success', 'Evaluation Successfully Updated');
    }

    public function show($id)
    {
        $data = Evaluation::findOrFail($id);
        return view('evaluation.show', compact('data'));
    }
}
