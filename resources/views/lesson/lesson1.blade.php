@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Basic Phrases & Greetings'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">

                    <div class="card-body p-3">
                        <div class="container mt-5">
                            <h2 class="text-center">Greetings and basic phrases</h2>
                            <p class="text-center">Below you will learn about different phrases. Click
                                "Next" to view the next card.</p>

                            <!-- Flashcard Container -->
                            <div class="flashcard-container">
                                <!-- Previous Button -->
                                <button id="prev-btn" class="btn btn-outline-dark me-3">
                                    <i class="bi bi-arrow-left-circle"></i> Previous
                                </button>

                                <!-- Flash Cards -->
                                @foreach (range(1, 20) as $i)
                                    <div id="flashcard{{ $i }}" class="flashcard">
                                        <div class="card flashcard-card">
                                            <img src="{{ url('/img/' . $imageNameArray[$i - 1]) }}" class="card-img-top"
                                                alt="Card Image">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $cardTitleArray[$i - 1] }}</h5>
                                                <p class="card-text">{{ $cardDescriptionArray[$i - 1] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <button id="next-btn" class="btn btn-outline-dark ms-3">
                                    Next <i class="bi bi-arrow-right-circle"></i>
                                </button>
                            </div>
                        </div>

                        <script>
                            let currentCard = 1;
                            const totalCards = 20;
                            const prevButton = document.getElementById('prev-btn');
                            const nextButton = document.getElementById('next-btn');

                            // Function to show a specific card by its number
                            function showCard(cardNumber) {
                                // Hide all cards
                                for (let i = 1; i <= totalCards; i++) {
                                    const flashcard = document.getElementById(`flashcard${i}`);
                                    flashcard.classList.remove('active');
                                }

                                // Show the current card
                                const currentFlashcard = document.getElementById(`flashcard${cardNumber}`);
                                currentFlashcard.classList.add('active');
                            }

                            // Next Button Click Event
                            nextButton.addEventListener('click', () => {
                                currentCard++;
                                if (currentCard > totalCards) {
                                    currentCard = 1; // Reset to the first card after reaching the last one
                                }
                                showCard(currentCard);
                            });

                            // Previous Button Click Event
                            prevButton.addEventListener('click', () => {
                                currentCard--;
                                if (currentCard < 1) {
                                    currentCard = totalCards; // Go to the last card if we are at the first one
                                }
                                showCard(currentCard);
                            });

                            // Show the first card by default
                            showCard(currentCard);
                        </script>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

    <style>
        /* Style for Flashcard container */
        .flashcard-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        /* Style for Flashcard items */
        .flashcard {
            display: none;
            margin: 10px;
            /* smaller width */
        }

        /* Make the flashcard visible when active */
        .flashcard.active {
            display: block;
        }

        /* Style the flashcard cards */
        .flashcard-card {
            width: 100%;
            max-width: 600px;
            /* Set a maximum width for the card */
            height: auto;
        }

        /* Style for images inside flashcards */
        .flashcard-card .card-img-top {
            height: 600px;
            /* Adjust image height */
            object-fit: cover;
            /* Ensure image covers the area */
        }

        /* Style for text content inside cards */
        .flashcard-card .card-body {
            font-size: 12px;
            /* Smaller font size for text */
            padding: 10px;
        }

        /* Style for the Next and Previous buttons */
        #prev-btn,
        #next-btn {
            font-size: 20px;
        }
    </style>

