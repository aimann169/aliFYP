<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SortingController extends Controller
{
    public function showSortingExercise()
    {
        // Arabic letters
        $correctLetterOrder = ['خ','ح','ج','ث','ت','ب','ا' ];
        $shuffledLetters = $correctLetterOrder;
        shuffle($shuffledLetters);

        // Arabic numbers
        $correctArabicNumberOrder = ['١٠','٩','٨','٧','٦','٥','٤','٣','٢','١']; // Arabic 1-10
        $shuffledArabicNumbers = $correctArabicNumberOrder;
        shuffle($shuffledArabicNumbers);

        return view('exercise.sorting', compact('shuffledLetters', 'correctLetterOrder', 'shuffledArabicNumbers', 'correctArabicNumberOrder'));
    }
}




