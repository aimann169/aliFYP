@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Speaking Exercise'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <!-- Start of your content -->
                        <style>


                            .container {
                                font-family: 'Roboto', sans-serif;

                                background-color: #fff;
                                border-radius: 10px;
                            }

                            #start-recognition {
                                padding: 12px 30px;
                                font-size: 18px;
                            }

                            #status {
                                font-size: 18px;
                                font-weight: 600;
                            }

                            footer p {
                                font-size: 14px;
                            }

                            .btn-custom {
                                padding: 12px 25px;
                                font-size: 16px;
                            }

                            #arabic-word {
                                font-family: 'Amiri', serif;
                                font-size: 120px;
                                color: #2c3e50;
                            }
                        </style>
                        
                        <div class="page-wrapper">
                            <div class="container py-5">
                                <!-- Header -->
                                <header class="text-center mb-5">
                                    <h1 class="display-4 text-primary">Speaking Exercise</h1>
                                    <p class="lead text-muted">Speak the word you see in Arabic!</p>
                                </header>

                                <!-- Word and Image Display -->
                                <div class="row justify-content-center mb-4">
                                    <div class="col-md-6 text-center">
                                        <div class="display-3 mb-4" id="arabic-word"></div> <!-- Arabic word display -->
                                    </div>
                                </div>

                                <!-- Speech Recognition Button -->
                                <div class="row justify-content-center mb-4">
                                    <div class="col-md-6 text-center">
                                        <button id="start-recognition" class="btn btn-success btn-lg"
                                            onclick="startRecognition()">Start
                                            Speaking</button>
                                        <p id="status" class="mt-3 text-secondary" style="font-weight: 500;">Waiting for
                                            speech...</p>
                                    </div>
                                </div>

                                <!-- Next and Previous Buttons -->
                                <div class="row justify-content-center mb-4">
                                    <div class="col-md-6 text-center">
                                        <button id="prev-word" class="btn btn-custom btn-outline-primary me-3"
                                            onclick="changeWord('prev')">
                                            < </button>
                                                <button id="next-word" class="btn btn-custom btn-outline-primary"
                                                    onclick="changeWord('next')">></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            // Word list to cycle through
                            const words = [
                                'السلام عليكم', // Assalamualaikum
                                'صباح الخير', // Good morning
                                'مساء الخير', // Good evening
                                'كيف حالك؟', // How are you
                                'شكراً', // Thank you
                                'أنا بخير', // Im fine
                                'عفواً', //welcome
                                'جزاك الله خير', //God bless you
                                'من فضلك', //please
                            ];
                            let currentIndex = 0;

                            // Function to update the Arabic word
                            function changeWord(direction) {
                                if (direction === 'next') {
                                    currentIndex = (currentIndex + 1) % words.length;
                                } else if (direction === 'prev') {
                                    currentIndex = (currentIndex - 1 + words.length) % words.length;
                                }
                                document.getElementById('arabic-word').innerText = words[currentIndex];
                            }

                            // Initialize with the first word
                            changeWord('next');

                            // Speech Recognition
                            let recognition;

                            if ('webkitSpeechRecognition' in window) {
                                recognition = new webkitSpeechRecognition();
                                recognition.lang = 'ar-SA'; // Set language to Arabic
                                recognition.continuous = false;
                                recognition.interimResults = false;

                                recognition.onstart = function() {
                                    document.getElementById('status').innerText = "Listening...";
                                };

                                recognition.onspeechend = function() {
                                    recognition.stop();
                                    document.getElementById('status').innerText = "Processing...";
                                };

                                recognition.onresult = function(event) {
                                    // Function to normalize Arabic text by removing diacritics and extra spaces
                                    function normalizeArabic(text) {
                                        return text
                                            .replace(/[\u064B-\u065F]/g, '') // Remove diacritics
                                            .trim(); // Remove extra spaces
                                    }

                                    const speechResult = normalizeArabic(event.results[0][0].transcript);
                                    const displayedWord = normalizeArabic(document.getElementById('arabic-word').innerText);

                                    if (displayedWord.includes(speechResult) || speechResult.includes(displayedWord)) {
                                        document.getElementById('status').innerText = "Correct! 🎉";
                                    } else {
                                        document.getElementById('status').innerText = `Incorrect. You said: "${speechResult}"`;
                                    }

                                };


                                recognition.onerror = function(event) {
                                    document.getElementById('status').innerText = `Error: ${event.error}`;
                                };
                            } else {
                                alert('Speech Recognition is not supported in this browser. Please use Google Chrome.');
                            }

                            function startRecognition() {
                                if (recognition) {
                                    recognition.start();
                                }
                            }
                        </script>
                        <!-- End of your content -->
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
