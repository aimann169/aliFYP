<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display the specified exercise.
     */
    public function show()
    {
        // $exercise = Exercise::findOrFail($id);
        return view('exercise.exercise');
    }


    public function showVoiceExercise()
    {
        return view('exercise.voice'); // Load the new Blade view for voice exercise
    }
    /**
     * Handle exercise submission.
     */
    public function submit(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'answers' => 'required|array',
        ]);

        $exercise = Exercise::findOrFail($id);
        $userAnswers = $request->input('answers');
        $correctAnswers = json_decode($exercise->answers, true); // Decode stored JSON answers

        // Calculate the score
        $score = 0;
        foreach ($correctAnswers as $key => $correctAnswer) {
            if (isset($userAnswers[$key]) && $userAnswers[$key] == $correctAnswer) {
                $score++;
            }
        }

        // Check if all answers are correct
        $isCorrect = $score === count($correctAnswers);

        return response()->json([
            'success' => $isCorrect,
            'score' => $score,
            'total' => count($correctAnswers),
            'message' => $isCorrect ? 'Perfect score! Well done!' : 'Keep trying to get all correct!',
        ]);
    }





}
