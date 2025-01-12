<?php

namespace App\Http\Controllers;

use App\Models\ActivityResult;
use App\Models\Property;
use App\Models\TenancyRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $alphabet = ActivityResult::where('user_id', auth()->user()->id)->where('activity_type', 'sorting')->first(); 
        $dragdrop = ActivityResult::where('user_id', auth()->user()->id)->where('activity_type', 'dragdrop')->first(); 
        $memory = ActivityResult::where('user_id', auth()->user()->id)->where('activity_type', 'memory')->first(); 

        $students = User::with('evaluation', 'sorting')->where('role', 'student')->get();
        return view('pages.dashboard', compact('alphabet', 'dragdrop', 'memory', 'students'));
    }

    public function formExample()
    {
        return view('pages.form-example');
    }
}
