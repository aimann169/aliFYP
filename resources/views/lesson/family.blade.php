@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Family Members'])

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <!-- Insert your content here -->

                        <div class="container py-5">
                            <h1 class="text-center display-6 mb-2">Learn About Family Members</h1>

                            <!-- Interactive Section -->
                            <div id="interactive-section" class="text-center mb-5">
                                <h2 class="mb-3">Who is this?</h2>
                                <img src="{{ url('/img/placeholder.png') }}" alt="Family Member" class="member-img"
                                    id="family-img" style="width: 120px; height: 120px;"> <!-- Smaller image -->
                                <p class="pronunciation hint" id="family-hint"></p>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn action-btn" onclick="showHint()">Hint</button>
                                    <button class="btn action-btn" onclick="nextFamilyMember()">Next</button>
                                </div>
                                <div class="feedback" id="feedback"></div>
                            </div>

                            <!-- Image Section -->
                            <h2 class="text-center mb-4">Family Members</h2>
                            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-4">
                                @php
                                    $familyMembers = [
                                        [
                                            'name' => 'Father',
                                            'arabic_name' => 'أب - Abi',
                                            'image' => '/img/father.png',
                                            'hint' => 'He is the head of the family.',
                                        ],
                                        [
                                            'name' => 'Mother',
                                            'arabic_name' => 'أم - Ummi',
                                            'image' => '/img/mother.png',
                                            'hint' => 'She loves and cares for everyone.',
                                        ],
                                        [
                                            'name' => 'Brother',
                                            'arabic_name' => 'أخ- Akhi',
                                            'image' => '/img/brother.png',
                                            'hint' => 'He protects and guides you.',
                                        ],
                                        [
                                            'name' => 'Sister',
                                            'arabic_name' => 'أخت- Ukhti',
                                            'image' => '/img/sister.png',
                                            'hint' => 'She’s sweet and adorable.',
                                        ],
                                        [
                                            'name' => 'Grandfather',
                                            'arabic_name' => 'جد - Jadd',
                                            'image' => '/img/grandfather.png',
                                            'hint' => 'He is wise and shares family traditions.',
                                        ],
                                        [
                                            'name' => 'Grandmother',
                                            'arabic_name' => 'جدة - Jadda',
                                            'image' => '/img/grandmother.png',
                                            'hint' => 'She is wise and shares family traditions.',
                                        ],
                                    ];
                                @endphp

                                @foreach ($familyMembers as $member)
                                    <div class="col">
                                        <div class="card member-card text-center p-3"
                                            onclick="checkAnswer('{{ $member['name'] }}', '{{ $member['arabic_name'] }}')">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{ url($member['image']) }}" alt="{{ $member['name'] }}"
                                                    class="member-img" style="width: 100px; height: 100px;">
                                                <!-- Smaller image -->
                                            </div>
                                            <h5 class="mt-2">{{ $member['name'] }}</h5>
                                            <p class="mt-1">{{ $member['arabic_name'] }}</p>
                                            <!-- Arabic name with larger text -->
                                        </div>
                                    </div>
                                @endforeach
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const familyMembers = @json($familyMembers);
        let currentMemberIndex = 0;

        // Update interactive section
        function updateFamilyMember() {
            const member = familyMembers[currentMemberIndex];
            document.getElementById('family-img').src = `{{ url('/') }}${member.image}`;
            document.getElementById('family-hint').textContent = ''; // Clear the hint
            document.getElementById('feedback').textContent = ''; // Clear feedback
        }

        // Show hint
        function showHint() {
            const member = familyMembers[currentMemberIndex];
            document.getElementById('family-hint').textContent = member.hint;
        }

        // Show next family member
        function nextFamilyMember() {
            currentMemberIndex = (currentMemberIndex + 1) % familyMembers.length;
            updateFamilyMember();
        }

        // Check if the selected family member is correct
        function checkAnswer(selectedName, selectedArabicName) {
            const correctName = familyMembers[currentMemberIndex].name;
            const correctArabicName = familyMembers[currentMemberIndex].arabic_name;
            const feedbackElement = document.getElementById('feedback');

            if (selectedName === correctName || selectedArabicName === correctArabicName) {
                feedbackElement.textContent = 'Correct!';
                feedbackElement.className = 'feedback correct';
                document.getElementById('family-img').src = `{{ url('/') }}${familyMembers[currentMemberIndex].image}`;
                document.getElementById('family-hint').textContent = correctArabicName;
            } else {
                feedbackElement.textContent = 'Wrong. Try again!';
                feedbackElement.className = 'feedback wrong';
            }
        }

        // Initialize the first family member
        updateFamilyMember();
    </script>
@endpush

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .member-card {
            background-color: #f9f7f3;
            border: 2px solid #90caf9;
            border-radius: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .member-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            background-color: #fff8e1;
        }

        .member-img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .pronunciation {
            margin-top: 10px;
            font-size: 1.2rem;
            color: #555;
        }

        .action-btn {
            background-color: #42a5f5;
            color: #fff;
            border: none;
            transition: background-color 0.3s;
        }

        .action-btn:hover {
            background-color: #1e88e5;
        }

        .feedback {
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 20px;
            min-height: 40px;
        }

        .feedback.correct {
            color: #4caf50;
        }

        .feedback.wrong {
            color: #f44336;
        }

        .hint {
            font-size: 1.2rem;
            margin-top: 10px;
            min-height: 40px;
            color: #555;
        }

        /* Increase Arabic text size and change font */
        .member-card p {
            font-size: 1.5rem;
            color: #555;
            font-family: 'Amiri', serif;
            /* Use Amiri font for better Arabic readability */
        }
    </style>
