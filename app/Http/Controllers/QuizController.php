<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function showQuiz()
    {
        // Sample questions with the correct answers added
        $questions = [
            [
                'text' => 'How do you say "thank you" in Arabic?',
                'options' => [
                    'من فضلك (Min fadlik)',
                    'شكرا (Shukran)',
                    'مرحبا (Marhaba)',
                    'صباح الخير (Sabah al-khayr)'
                ],
                'correct_answer' => 1,
            ],
            [
                'text' => 'How do you say "winter" in Arabic?',
                'options' => [
                    'الخريف (Al-Khareef)',
                    'الربيع (Al-Rabee)',
                    'الصيف (Al-Sayf)',
                    'الشتاء (Al-Shitaa)'
                ],
                'correct_answer' => 3,
            ],
            [
                'text' => 'Which of the following is the first letter of the Arabic alphabet?',
                'options' => [
                    'ب (Baa)',
                    'أ (Alif)',
                    'ج (Jeem)',
                    'د (Daal)'
                ],
                'correct_answer' => 1,
            ],
            [
                'text' => 'Which Arabic letter is pronounced as "taa"?',
                'options' => [
                    'ت (Taa)',
                    'ث (Thaa)',
                    'ج (Jeem)',
                    'ح (Haa)'
                ],
                'correct_answer' => 0,
            ],
            [
                'text' => 'What is the Arabic word for "brother"?',
                'options' => [
                    'أخ (Akh)',
                    'أخت (Ukht)',
                    'ابن (Ibn)',
                    'زوج (Zawj)'
                ],
                'correct_answer' => 0,
            ],
            [
                'text' => 'What is the Arabic word for "grandfather"?',
                'options' => [
                    'عم (Amm)',
                    'جدي (Jaddi)',
                    'أخت (Ukht)',
                    'ابن (Ibn)'
                ],
                'correct_answer' => 1,
            ],
            [
                'text' => 'What is the Arabic word for "ten"?',
                'options' => [
                    'ثلاث (Thalath)',
                    'عشرة (Ashara)',
                    'واحد (Wahed)',
                    'ستة (Sittah)'
                ],
                'correct_answer' => 1,
            ],
            [
                'text' => 'What is this 5 in Arabic?',
                'options' => [
                    '٥',
                    '٤',
                    '٧',
                    '٩'
                ],
                'correct_answer' => 0,
            ],
            [
                'text' => 'What is the Arabic word for "January"?',
                'options' => [
                    'يناير (Yanair)',
                    'فبراير (Febrair)',
                    'مارس (Mars)',
                    'أبريل (Abril)'
                ],
                'correct_answer' => 0,
            ],
            [
                'text' => 'What is the Arabic word for "spring"?',
                'options' => [
                    'الخريف (Al-Khareef)',
                    'الصيف (Al-Sayf)',
                    'الربيع (Al-Rabee’)',
                    'الشتاء (Al-Shitaa)'
                ],
                'correct_answer' => 2,
            ],
            [
                'text' => 'What is the Arabic word for "teacher"?',
                'options' => [
                    'طبيب (Tabeeb)',
                    'مهندس (Muhandis)',
                    'معلم (Mu’allim)',
                    ' مزارع (Mazari )'
                ],
                'correct_answer' => 2,
            ],
            [
                'text' => 'How do you say "doctor" in Arabic?',
                'options' => [
                    'طبيب (Tabeeb)',
                    'محاسب (Muhasib)',
                    'ممرض (Mumarrid)',
                    'مدير (Mudeer)'
                ],
                'correct_answer' => 0,
            ],
            [
                'text' => 'What is the Arabic word for "engineer"?',
                'options' => [
                    'محامي (Muhami)',
                    'مهندس (Muhandis)',
                    'شرطي (Shurti)',
                    'طاهٍ (Tahin)'
                ],
                'correct_answer' => 1,
            ],
            [
                'text' => 'What is the Arabic word for "red"?',
                'options' => [
                    'أخضر (Akhdar)',
                    'أحمر (Ahmar)',
                    'أزرق (Azraq)',
                    'أصفر (Asfar)'
                ],
                'correct_answer' => 1,
            ],
            [
                'text' => 'How do you say "black" in Arabic?',
                'options' => [
                    'أبيض (Abyad)',
                    'أسود (Aswad)',
                    'أحمر (Ahmar)',
                    'بني (Bunni)'
                ],
                'correct_answer' => 1,
            ],
            [
                'text' => 'What is the Arabic word for "green"?',
                'options' => [
                    'أحمر (Ahmar)',
                    'أصفر (Asfar)',
                    'أخضر (Akhdar)',
                    'أزرق (Azraq)'
                ],
                'correct_answer' => 2,
            ],
            [
                'text' => 'What is the Arabic word for "eye"?',
                'options' => [
                    'أذن (Udhun)',
                    'رأس (Ra’s)',
                    'فم (Famm)',
                    'عين (Ayn) '
                ],
                'correct_answer' => 3,
            ],
            [
                'text' => 'What is the Arabic word for "mouth"?',
                'options' => [
                    'أنف (Anf)',
                    'رأس (Ra’s)',
                    'فم (Famm)',
                    'عين (Ayn) '
                ],
                'correct_answer' => 2,
            ],
            [
                'text' => 'How do you say "foot" in Arabic?',
                'options' => [
                    'قدم (Qadam)',
                    'يد (Yad)',
                    'رأس (Ra’s)',
                    'أذن (Udhun) '
                ],
                'correct_answer' => 0,
            ],
            [
                'text' => 'How do you say "hand" in Arabic?',
                'options' => [
                    'رجل (Rijl)',
                    'يد (Yad)',
                    'فم (Famm)',
                    'أذن (Udhun) '
                ],
                'correct_answer' => 1,
            ],
        ];

        // Pass questions to the view

        return view('exercise.quiz', compact('questions'));
    }

    public function checkAnswers(Request $request)
    {
        // Sample questions with correct answers (same as in showQuiz)
        $questions = [
            [
                'text' => 'How do you say "thank you" in Arabic?',
                'options' => [
                    'من فضلك (Min fadlik)',
                    'شكرا (Shukran)',
                    'مرحبا (Marhaba)',
                    'صباح الخير (Sabah al-khayr)'
                ],
                'correct_answer' => 'شكرا (Shukran)',
            ],
            [
                'text' => 'How do you say "winter" in Arabic?',
                'options' => [
                    'الخريف (Al-Khareef)',
                    'الربيع (Al-Rabee)',
                    'الصيف (Al-Sayf)',
                    'الشتاء (Al-Shitaa)'
                ],
                'correct_answer' => 'الشتاء (Al-Shitaa)',
            ],
            [
                'text' => 'Which of the following is the first letter of the Arabic alphabet?',
                'options' => [
                    'ب (Baa)',
                    'أ (Alif)',
                    'ج (Jeem)',
                    'د (Daal)'
                ],
                'correct_answer' => 'أ (Alif)',
            ],
            [
                'text' => 'Which Arabic letter is pronounced as "taa"?',
                'options' => [
                    'ت (Taa)',
                    'ث (Thaa)',
                    'ج (Jeem)',
                    'ح (Haa)'
                ],
                'correct_answer' => 'ت (Taa)',
            ],
            [
                'text' => 'What is the Arabic word for "brother"?',
                'options' => [
                    'أخ (Akh)',
                    'أخت (Ukht)',
                    'ابن (Ibn)',
                    'زوج (Zawj)'
                ],
                'correct_answer' => 'أخ (Akh)',
            ],
            [
                'text' => 'What is the Arabic word for "grandfather"?',
                'options' => [
                    'عم (Amm)',
                    'جدي (Jaddi)',
                    'أخت (Ukht)',
                    'ابن (Ibn)'
                ],
                'correct_answer' => 'جدي (Jaddi)',
            ],
            [
                'text' => 'What is the Arabic word for "ten"?',
                'options' => [
                    'ثلاث (Thalath)',
                    'عشرة (Ashara)',
                    'واحد (Wahed)',
                    'ستة (Sittah)'
                ],
                'correct_answer' => 'عشرة (Ashara)',
            ],
            [
                'text' => 'What is 5 in Arabic?',
                'options' => [
                    '٥',
                    '٤',
                    '٧',
                    '٩'
                ],
                'correct_answer' => '٥',
            ],
            [
                'text' => 'What is the Arabic word for "January"?',
                'options' => [
                    'يناير (Yanair)',
                    'فبراير (Febrair)',
                    'مارس (Mars)',
                    'أبريل (Abril)'
                ],
                'correct_answer' => 'يناير (Yanair)',
            ],
            [
                'text' => 'What is the Arabic word for "spring"?',
                'options' => [
                    'الخريف (Al-Khareef)',
                    'الصيف (Al-Sayf)',
                    'الربيع (Al-Rabee’)',
                    'الشتاء (Al-Shitaa)'
                ],
                'correct_answer' => 'الربيع (Al-Rabee)',
            ],
            [
                'text' => 'What is the Arabic word for "teacher"?',
                'options' => [
                    'طبيب (Tabeeb)',
                    'مهندس (Muhandis)',
                    'معلم (Mu’allim)',
                    ' مزارع (Mazari )'
                ],
                'correct_answer' => 'معلم (Mu’allim)',
            ],
            [
                'text' => 'How do you say "doctor" in Arabic?',
                'options' => [
                    'طبيب (Tabeeb)',
                    'محاسب (Muhasib)',
                    'ممرض (Mumarrid)',
                    'مدير (Mudeer)'
                ],
                'correct_answer' => 'طبيب (Tabeeb)',
            ],
            [
                'text' => 'What is the Arabic word for "engineer"?',
                'options' => [
                    'محامي (Muhami)',
                    'مهندس (Muhandis)',
                    'شرطي (Shurti)',
                    'طاهٍ (Tahin)'
                ],
                'correct_answer' => 'مهندس (Muhandis)',
            ],
            [
                'text' => 'What is the Arabic word for "red"?',
                'options' => [
                    'أخضر (Akhdar)',
                    'أحمر (Ahmar)',
                    'أزرق (Azraq)',
                    'أصفر (Asfar)'
                ],
                'correct_answer' => 'أحمر (Ahmar)',
            ],
            [
                'text' => 'How do you say "black" in Arabic?',
                'options' => [
                    'أبيض (Abyad)',
                    'أسود (Aswad)',
                    'أحمر (Ahmar)',
                    'بني (Bunni)'
                ],
                'correct_answer' => 'أسود (Aswad)',
            ],
            [
                'text' => 'What is the Arabic word for "green"?',
                'options' => [
                    'أحمر (Ahmar)',
                    'أصفر (Asfar)',
                    'أخضر (Akhdar)',
                    'أزرق (Azraq)'
                ],
                'correct_answer' => 'أخضر (Akhdar)',
            ],
            [
                'text' => 'What is the Arabic word for "eye"?',
                'options' => [
                    'أذن (Udhun)',
                    'رأس (Ra’s)',
                    'فم (Famm)',
                    'عين (Ayn) '
                ],
                'correct_answer' => 'أخضر (Akhdar)',
            ],
            [
                'text' => 'What is the Arabic word for "mouth"?',
                'options' => [
                    'أنف (Anf)',
                    'رأس (Ra’s)',
                    'فم (Famm)',
                    'عين (Ayn) '
                ],
                'correct_answer' => 'فم (Famm)',
            ],
            [
                'text' => 'How do you say "foot" in Arabic?',
                'options' => [
                    'قدم (Qadam)',
                    'يد (Yad)',
                    'رأس (Ra’s)',
                    'أذن (Udhun) '
                ],
                'correct_answer' => 'قدم (Qadam)',
            ],
            [
                'text' => 'How do you say "hand" in Arabic?',
                'options' => [
                    'رجل (Rijl)',
                    'يد (Yad)',
                    'فم (Famm)',
                    'أذن (Udhun) '
                ],
                'correct_answer' => 'يد (Yad)',
            ],
        ];

        $userAnswers = $request->input('answers', []); // Get user answers
        $score = 0;
        $feedback = []; // To store feedback for each question

        // Evaluate the answers
        foreach ($questions as $index => $question) {
            $selectedOption = $userAnswers[$index] ?? null; // User's selected option
            $isCorrect = isset($question['options'][$selectedOption]) &&
                $question['options'][$selectedOption] === $question['correct_answer'];

            $feedback[$index] = [
                'is_correct' => $isCorrect,
                'selected_option' => $question['options'][$selectedOption] ?? null,
                'correct_option' => $question['correct_answer'],
            ];

            if ($isCorrect) {
                $score++;
            }
        }

        // Pass feedback and score to the view
        return view('exercise.quiz', [
            'questions' => $questions,
            'feedback' => $feedback,
            'score' => $score,
        ]);
    }
}