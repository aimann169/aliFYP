@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Basic Phrases & Greeting Exercise'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-body p-3">


                        <div class="container text-center p-4 rounded " style="background: #ffffff;">
                            <h3>Drag the correct answer into the matching box:</h3>

                            <div class="row justify-content-center">
                                <!-- Draggable Items Section -->
                                <div class="col-md-6 mb-4">
                                    <div id="draggable-items" class="d-flex flex-wrap justify-content-center">
                                        <div class="draggable-item" data-answer="morning">
                                            <img src="{{ url('/img/morning.png') }}" alt="Morning">
                                        </div>
                                        <div class="draggable-item" data-answer="howareu">
                                            <img src="{{ url('/img/howareu.png') }}" alt="Howareu">
                                        </div>
                                        <div class="draggable-item" data-answer="evening">
                                            <img src="{{ url('/img/evening.png') }}" alt="Evening">
                                        </div>
                                        <div class="draggable-item" data-answer="fine">
                                            <img src="{{ url('/img/fine.png') }}" alt="Fine">
                                        </div>
                                        <div class="draggable-item" data-answer="thanks">
                                            <img src="{{ url('/img/thanks.png') }}" alt="Thanks">
                                        </div>
                                        <div class="draggable-item" data-answer="salam">
                                            <img src="{{ url('/img/salam.png') }}" alt="Salam">
                                        </div>
                                        <div class="draggable-item" data-answer="welcome">
                                            <img src="{{ url('/img/welcome.png') }}" alt="Welcome">
                                        </div>
                                        <div class="draggable-item" data-answer="please">
                                            <img src="{{ url('/img/please.png') }}" alt="Please">
                                        </div>
                                        <div class="draggable-item" data-answer="bless">
                                            <img src="{{ url('/img/bless.png') }}" alt="Bless">
                                        </div>
                                    </div>
                                </div>

                                <!-- Answer Boxes Section -->
                                <div class="col-md-6">
                                    <div id="answer-boxes" class="d-flex flex-wrap justify-content-center">
                                        <div class="box answer-box" data-correct="bless"><span class="box-text">God Bless
                                                You</span></div>
                                        <div class="box answer-box" data-correct="welcome"><span
                                                class="box-text">Welcome</span></div>
                                        <div class="box answer-box" data-correct="morning"><span class="box-text">Good
                                                Morning</span></div>
                                        <div class="box answer-box" data-correct="fine"><span class="box-text">I'm
                                                Fine</span></div>
                                        <div class="box answer-box" data-correct="salam"><span
                                                class="box-text">Greetings</span></div>
                                        <div class="box answer-box" data-correct="evening"><span class="box-text">Good
                                                Evening</span></div>
                                        <div class="box answer-box" data-correct="thanks"><span class="box-text">Thank
                                                You</span></div>
                                        <div class="box answer-box" data-correct="howareu"><span class="box-text">How Are
                                                You?</span></div>
                                        <div class="box answer-box" data-correct="please"><span
                                                class="box-text">Please</span></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit and Reset Buttons -->

                            <div class="mt-3">
                                <form method="POST" action="{{ route('activity_result.store') }}">
                                    @csrf
                                    <input type="hidden" id="marks" name="marks">
                                    <input type="hidden" name="activity_type" value="dragdrop">
                                    <button id="submit-btn" class="btn btn-primary me-2" type="submit">Submit</button>
                                    <button id="reset-btn" class="btn btn-secondary" type="button">Reset</button>
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

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        // JavaScript functionality from your original content
        new Sortable(document.getElementById('draggable-items'), {
            group: 'shared',
            animation: 150,
        });

        document.querySelectorAll('.answer-box').forEach((box) => {
            new Sortable(box, {
                group: 'shared',
                animation: 150,
                onAdd: (evt) => {
                    const answerText = evt.to.querySelector('.box-text');
                    if (answerText) {
                        answerText.style.visibility = 'hidden';
                    }
                },
                onRemove: (evt) => {
                    const answerText = evt.from.querySelector('.box-text');
                    if (answerText) {
                        answerText.style.visibility = 'visible';
                    }
                },
            });
        });

        document.getElementById('reset-btn').addEventListener('click', () => {
            const draggableContainer = document.getElementById('draggable-items');
            document.querySelectorAll('.draggable-item').forEach((item) => {
                draggableContainer.appendChild(item);
            });

            document.querySelectorAll('.answer-box .box-text').forEach((text) => {
                text.style.visibility = 'visible';
            });

            alert('Game has been reset!');
        });

        document.getElementById('submit-btn').addEventListener('click', () => {
            const draggableContainer = document.getElementById('draggable-items');
            let allCorrect = true;
            let marks = 9;
            document.querySelectorAll('.answer-box').forEach((box) => {
                const item = box.querySelector('.draggable-item');

                const correctAnswer = box.getAttribute('data-correct');


                if (!item || item.getAttribute('data-answer') !== correctAnswer) {
                    allCorrect = false;
                    marks -= 1;
                    if (item) {
                        draggableContainer.appendChild(item);
                    }

                    const placeholder = box.querySelector('.box-text');
                    if (placeholder) {
                        placeholder.style.visibility = 'visible';
                    }
                }
            });
            $('#marks').val(marks);
        });
    </script>
@endpush

<style>
    .box {
        width: 150px;
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 2px dashed #ccc;
        background-color: #f9f9f9;
        margin: 10px;
        font-size: 16px;
        position: relative;
    }

    .draggable-item {
        width: 150px;
        height: 150px;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        cursor: grab;
        margin: 10px;
        border: 2px solid black;
    }

    .draggable-item img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 5px;
    }

    .answer-box {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 16px;
        font-weight: bold;
        color: #666;
        text-align: center;
    }

    .box-text {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    .disabled {
        pointer-events: none;
        opacity: 0.5;
    }
</style>
