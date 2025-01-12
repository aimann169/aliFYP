@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Memory Game: Learn Body Parts'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <div class="container text-center">
                            <h1 class="text-center mb-3">Memory Game: Learn Body Parts</h1>
                            <p class="text-muted mb-5">Match the images to their Arabic names!</p>

                            <div class="timer-container mb-4">
                                <button id="startTimer" class="btn btn-primary d-none">Start Timer</button>
                                <p id="timerDisplay" class="mt-3">Time: 00:00</p>
                            </div>

                            <div class="game-container" id="game-container">
                                <!-- Boxes will be generated dynamically -->
                            </div>

                            <div class="mt-5">
                                <form method="POST" action="{{ route('activity_result.store') }}">
                                    @csrf
                                    <input type="hidden" id="marks" name="marks">
                                    <input type="hidden" name="activity_type" value="memory">
                                    <button id="submit-btn" class="btn btn-primary me-2" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

<style>
    .game-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        max-width: 600px;
        margin: auto;
    }

    .box {
        width: 100%;
        height: 150px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.2rem;
        font-weight: bold;
        background: #f8f9fa;
        border: 2px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        position: relative;
    }

    .box:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .box img {
        max-width: 70%;
        max-height: 70%;
        display: none;
    }

    .box .text {
        display: none;
        font-size: 4rem;
        text-align: center;
        color: #333;
    }

    .box.flipped img,
    .box.flipped .text {
        display: block;
    }

    .box.flipped {
        background: #007bff;
        color: white;
        border-color: #0056b3;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .timer-container {
        margin-bottom: 20px;
    }

    #timerDisplay {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
    }
</style>

@push('js')
    <script>
        const cards = [{
                id: 1,
                type: 'head',
                content: 'رأس',
                isArabic: true
            },
            {
                id: 2,
                type: 'hand',
                content: 'يد',
                isArabic: true
            },
            {
                id: 3,
                type: 'foot',
                content: 'قدم',
                isArabic: true
            },
            {
                id: 4,
                type: 'mouth',
                content: 'فَم',
                isArabic: true
            },
            {
                id: 5,
                type: 'eye',
                content: 'عَيْن',
                isArabic: true
            },
            {
                id: 6,
                type: 'ear',
                content: 'أُذُن',
                isArabic: true
            },
            {
                id: 7,
                type: 'head',
                content: '{{ asset("/img/head.png") }}',
                isArabic: false
            },
            {
                id: 8,
                type: 'hand',
                content: '{{ asset("/img/hand.png") }}',
                isArabic: false
            },
            {
                id: 9,
                type: 'foot',
                content: '{{ asset("/img/foot.png") }}',
                isArabic: false
            },
            {
                id: 10,
                type: 'mouth',
                content: '{{ asset("/img/mouth.png") }}',
                isArabic: false
            },
            {
                id: 11,
                type: 'eye',
                content: '{{ asset("/img/eye.png") }}',
                isArabic: false
            },
            {
                id: 12,
                type: 'ear',
                content: '{{ asset("/img/ear.png") }}',
                isArabic: false
            },
        ];

        const shuffledCards = cards.sort(() => Math.random() - 0.5);
        const gameContainer = document.getElementById('game-container');
        let firstBox = null;
        let lockBoard = false;
        let timer;
        let seconds = 0;
        let minutes = 0;
        let timerRunning = false;

        function startTimer() {
            if (timerRunning) return;
            timerRunning = true;

            timer = setInterval(() => {
                seconds++;
                if (seconds === 60) {
                    seconds = 0;
                    minutes++;
                }
                $('#marks').val(`Time: ${formatTime(minutes)}:${formatTime(seconds)}`);

                document.getElementById('timerDisplay').textContent =
                    `Time: ${formatTime(minutes)}:${formatTime(seconds)}`;
            }, 1000);
        }

        function stopTimer() {
            clearInterval(timer);
            timerRunning = false;
        }

        function formatTime(time) {
            return time < 10 ? `0${time}` : time;
        }

        function createBox(card) {
            const boxElement = document.createElement('div');
            boxElement.classList.add('box');
            boxElement.dataset.type = card.type;

            if (card.isArabic) {
                boxElement.innerHTML = `<div class="text">${card.content}</div>`;
            } else {
                boxElement.innerHTML = `<img src="${card.content}" alt="${card.type}">`;
            }

            boxElement.addEventListener('click', () => flipBox(boxElement));
            return boxElement;
        }

        function flipBox(boxElement) {
            if (lockBoard || boxElement.classList.contains('flipped')) return;

            boxElement.classList.add('flipped');

            if (!firstBox) {
                firstBox = boxElement;
                startTimer();
            } else {
                checkMatch(boxElement);
            }
        }

        function checkMatch(secondBox) {
            lockBoard = true;

            if (firstBox.dataset.type === secondBox.dataset.type) {
                firstBox.removeEventListener('click', flipBox);
                secondBox.removeEventListener('click', flipBox);
                resetBoard();
            } else {
                setTimeout(() => {
                    firstBox.classList.remove('flipped');
                    secondBox.classList.remove('flipped');
                    resetBoard();
                }, 1000);
            }
        }

        function resetBoard() {
            [firstBox, lockBoard] = [null, false];
        }

        function initializeGame() {
            shuffledCards.forEach(card => {
                const boxElement = createBox(card);
                gameContainer.appendChild(boxElement);
            });
        }

        document.getElementById('startTimer').addEventListener('click', startTimer);

        initializeGame();
    </script>
@endpush
