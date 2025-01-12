@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Alphabet & Number Exercise'])

    <div class="container-fluid py-4">
        <div class="row mt-4 justify-content-center align-items-center" >
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <!-- Content here -->
                        <div class="container">
                            <div id="letterSection" class="flash-card">
                                <div class="card-body">
                                    <h5 class="card-title">Sort the Arabic Letters</h5>
                                    <p class="lead text-muted">Drag and drop the letters to arrange them in alphabetical
                                        order.</p>
                                    <div class="sortable-container" id="letterContainer">
                                        @foreach ($shuffledLetters as $letter)
                                            <div class="sortable-item" draggable="true">{{ $letter }}</div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>

                            <div id="numberSection" class="flash-card" style="display: none;">
                                <div class="card-body">
                                    <h5 class="card-title">Sort the Arabic Numbers</h5>
                                    <p class="lead">Drag and drop the numbers to arrange them in ascending order.</p>
                                    <div class="sortable-container" id="numberContainer">
                                        @foreach ($shuffledArabicNumbers as $number)
                                            <div class="sortable-item" draggable="true">{{ $number }}</div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>


                        </div>
                        <div class="navigation-buttons">
                            <form method="POST" action="{{ route('activity_result.store') }}">
                                @csrf
                                <input type="hidden" id="marks" name="marks">
                                <input type="hidden" name="activity_type" value="sorting">
                                <button class="btn btn-primary" onclick="navigate('prev')" type="button">Previous</button>
                                <button class="btn btn-primary" onclick="navigate('next')" type="button">Next</button>
                                <button class="btn btn-primary" type="submit">Submit Answer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script>
        // Enable drag-and-drop functionality for both sections
        function enableDragAndDrop(containerId) {
            const container = document.getElementById(containerId);
            let draggedItem = null;

            container.addEventListener('dragstart', function(e) {
                if (e.target.classList.contains('sortable-item')) {
                    draggedItem = e.target;
                    setTimeout(() => e.target.style.display = 'none', 0);
                }
            });

            container.addEventListener('dragend', function(e) {
                if (e.target.classList.contains('sortable-item')) {
                    setTimeout(() => e.target.style.display = 'block', 0);
                    draggedItem = null;
                }
            });

            container.addEventListener('dragover', function(e) {
                e.preventDefault();
            });

            container.addEventListener('drop', function(e) {
                e.preventDefault();
                if (e.target.classList.contains('sortable-item') && draggedItem) {
                    const children = Array.from(container.children);
                    const draggedIndex = children.indexOf(draggedItem);
                    const targetIndex = children.indexOf(e.target);

                    if (draggedIndex < targetIndex) {
                        container.insertBefore(draggedItem, e.target.nextSibling);
                    } else {
                        container.insertBefore(draggedItem, e.target);
                    }
                }
                var type = (containerId == 'letterContainer') ? 'letter' : 'number';
                checkOrder(type);
            });
        }

        // Initialize drag-and-drop for both containers
        enableDragAndDrop('letterContainer');
        enableDragAndDrop('numberContainer');

        // Check the user's arrangement
        let letterscore = 0;
        let numberscore = 0;

        function checkOrder(type) {
            var totalscore = 0;
            const containerId = type === 'letter' ? 'letterContainer' : 'numberContainer';
            const currentOrder = Array.from(document.getElementById(containerId).children).map(item => item.textContent);
            const correctOrder = type === 'letter' ? @json($correctLetterOrder) : @json($correctArabicNumberOrder);

            if (JSON.stringify(currentOrder) === JSON.stringify(correctOrder)) {
                if (type === 'letter') letterscore = 5;
                if (type === 'number') numberscore = 5;
                // Swal.fire(
                //     'Correct!',
                //     `The ${type}s are in the right order.`,
                //     'success'
                // )
            }


            totalscore = letterscore + numberscore;
            $('#marks').val(totalscore);
        }

        // Navigate between letter and number exercises
        function navigate(direction) {
            const letterSection = document.getElementById('letterSection');
            const numberSection = document.getElementById('numberSection');
            if (direction === 'next') {
                letterSection.style.display = 'none';
                numberSection.style.display = 'inline-block';
            } else {
                letterSection.style.display = 'inline-block';
                numberSection.style.display = 'none';
            }
        }
    </script>
@endpush

<style>
    .text-muted {
        font-size: 0.9rem;
        /* Adjust the size as preferred */
    }

    .card-title {
        font-size: 3rem;
        font-family: 'Roboto', sans-serif;
        /* Adjust the font size as needed */
    }

    /* Center the flash-card within the container */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        /* Make sure it takes up the full height */
    }

    .flash-card {
        background-color: #f9f9f9;
        padding: 30px;
        border: 2px solid #dee2e6;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px;
        display: inline-block;
        width: 1500px;
        text-align: center;
    }

    .flash-card .card-body {
        margin-top: 30px;
    }

    .sortable-container {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin: 20px 0;
        flex-wrap: wrap;
        justify-content: space-evenly;
    }

    .sortable-item {
        padding: 20px 20px;
        border: 2px solid #dee2e6;
        border-radius: 10px;
        background-color: #f8f9fa;
        cursor: grab;
        user-select: none;
        font-size: 2rem;
        font-weight: bold;
        width: 80px;
        text-align: center;
    }

    .sortable-item:hover {
        background-color: #e9ecef;
    }

    .navigation-buttons {
        display: flex;
        justify-content: center;
        /* Center the buttons horizontally */
        align-items: center;
        /* Center the buttons vertically */
        margin-top: 20px;
        /* Make the container take full viewport height */
    }

    .navigation-buttons button {
        width: 150px;
        margin: 10px;
        /* Space between the buttons */
    }
</style>
