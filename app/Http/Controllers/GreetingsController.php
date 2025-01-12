<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetingsController extends Controller
{
    public function showLesson()
    {
        // Image file names for the flashcards
        $imageNameArray = [
            'salam.png',
            'jawabSalam.png',
            'morning.png',
            'replyMorning.png',
            'evening.png',
            'replyEvening.png',
            'hello.png',
            'marhaban.png',
            'howareu.png',
            'fine.png',
            'thanks.png',
            'welcome.png',
            'seeYouAgain.png',
            'sweetDream.png',
            'bless.png',
            'innsyallah.png',
            'please.png',
            'excuseMe.png',
            'beg.png',
            'sorry.png'
        ];

        // Titles for the flashcards
        $cardTitleArray = [
            'As-salamu alaikum - Peace be upon you',
            'Wa-\'alaikum salam - And upon you be peace',
            'Sabah al-kheir - Good Morning',
            'Sabah an-nur - Morning of light',
            'Masa\' al-kheir - Good Evening',
            'Masa\' an-nur - Evening of light',
            'Ahlan wa sahlan - Welcome or Hello',
            'Marhaban - Welcome or Hello',
            'Kaefa haaluk? - How Are You?',
            'Ana bikhairin - I\'m fine',
            'Shukran - Thank You',
            'Afwan - You are welcome',
            'Ilal-liqak - See You Again',
            'Ahlam Jamilah - Sweet Dreams',
            'JazakAllah Khair - May Allah reward you with goodness',
            'Insya Allah - God willing',
            'Min Fadhlik - Please',
            'Ismah Li - Excuse me',
            'Arjuka - I beg you or I hope that you',
            'Aasif - Sorry'
        ];

        // Descriptions for the flashcards
        $cardDescriptionArray = [
            'A greeting to start a conversation.',
            'To respond to the greeting "Assalamualaikum".',
            'A polite greeting often used in the morning.',
            'This is a common response to “Sabah al-kheir”.',
            'A greeting used in the evening time.',
            'This is a common response to “Masa’ al-khayr”.',
            'This is a warm welcome greeting.',
            'This is a general greeting that is often used in informal settings.',
            'A common question used to ask about someone\'s well-being.',
            'To say that you are fine and healthy.',
            'To say thank you.',
            'To respond to “Thank you”.',
            'To say goodbye.',
            'Use it to wish someone pleasant dreams.',
            'It is a more meaningful way of saying "thank you".',
            'To express hope or intention for something to happen in the future that depends on Allah\'s will.',
            'It is commonly used to make requests or ask for something in a courteous manner.',
            'It is used to politely get someone\'s attention, ask for permission, or apologize.',
            'It conveys a sense of urgency or deep need when asking for something.',
            'It is used to apologize or express regret in various situations.'
        ];

        // Passing data to the view
        return view('lesson.lesson1', compact('imageNameArray', 'cardTitleArray', 'cardDescriptionArray'));
    }
}
