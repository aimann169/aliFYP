<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColorController extends Controller
{
    //
    public function index()
    {
        // Return the view for the color chart
        return view('lesson.color');
    }
}
