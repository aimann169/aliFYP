<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BodyPartsController extends Controller
{
    //
    public function index()
    {
        return view('lesson.bodyParts'); // The name of your Blade file without the .blade.php extension
    }
}
