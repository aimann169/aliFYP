@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Body Parts     '])

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">

                    <div class="card-body p-3">
                        <!-- Your content here -->

                        <!-- Content starts here -->


                        <div class="container my-5">
                            <h1 class="text-center mb-4 text-center">Learn Body Parts in Arabic</h1>
                            <div class="row">
                                <!-- Human Body Image -->
                                <div class="col-lg-6">
                                    <div class="position-relative">
                                        <img src="{{ asset('/img/boy.png') }}" alt="Human Body" class="img-fluid">
                                        <!-- Clickable body parts -->
                                        <button class="btn btn-outline-primary position-absolute body-part-btn"
                                            style="top: 12%; left: 90%; transform: translate(-50%, -50%);"
                                            onclick="showBodyPart('شَعْر', 'Hair', 'sha-ar')">شَعْر</button>
                                        <button class="btn btn-outline-primary position-absolute body-part-btn"
                                            style="top: 27%; left: 90%; transform: translate(-50%, -50%);"
                                            onclick="showBodyPart('أَنْف', 'Nose', 'anf')">أَنْف</button>
                                        <button class="btn btn-outline-primary position-absolute body-part-btn"
                                            style="top: 38%; left: 90%; transform: translate(-50%, -50%);"
                                            onclick="showBodyPart('فَم', 'Mouth', 'fam')">فَم</button>
                                        <button class="btn btn-outline-primary position-absolute body-part-btn"
                                            style="top: 46%; left: 90%; transform: translate(-50%, -50%);"
                                            onclick="showBodyPart('رقبة', 'Neck', 'raqabah')">رقبة</button>
                                        <button class="btn btn-outline-primary position-absolute body-part-btn"
                                            style="top: 65%; left: 90%; transform: translate(-50%, -50%);"
                                            onclick="showBodyPart('يد', 'Hand', 'yad')">يد</button>
                                        <button class="btn btn-outline-primary position-absolute body-part-btn"
                                            style="top: 95%; left: 90%; transform: translate(-50%, -50%);"
                                            onclick="showBodyPart('قدم', 'Foot', 'qadam')">قدم</button>

                                        <button class="btn btn-outline-primary position-absolute body-part-btn"
                                            style="top: 20%; left: 10%; transform: translate(-50%, -50%);"
                                            onclick="showBodyPart('رأس', 'Head', 'raas')">رأس</button>
                                        <button class="btn btn-outline-primary position-absolute body-part-btn"
                                            style="top: 31%; left: 10%; transform: translate(-50%, -50%);"
                                            onclick="showBodyPart('عَيْن', 'Eye', 'ayn')">عَيْن</button>
                                        <button class="btn btn-outline-primary position-absolute body-part-btn"
                                            style="top: 38%; left: 10%; transform: translate(-50%, -50%);"
                                            onclick="showBodyPart('أُذُن', 'Ear', 'udhun')">أُذُن</button>
                                        <button class="btn btn-outline-primary position-absolute body-part-btn"
                                            style="top: 71%; left: 10%; transform: translate(-50%, -50%);"
                                            onclick="showBodyPart('إِصْبَع', 'Finger', 'isba')">إِصْبَع</button>
                                        <button class="btn btn-outline-primary position-absolute body-part-btn"
                                            style="top: 83%; left: 10%; transform: translate(-50%, -50%);"
                                            onclick="showBodyPart('رُكْبَة', 'Knee', 'rukbah')">رُكْبَة</button>
                                    </div>
                                </div>

                                <!-- Info Card -->
                                <div class="col-lg-6">
                                    <div id="info-card" class="card shadow-sm">
                                        <div class="card-body text-center">
                                            <h3 id="arabic-name">—</h3>
                                            <p id="english-name" class="text-muted">Click on a body part</p>
                                            <!-- Added pronunciation text -->
                                            <p id="pronunciation" class="text-muted">Pronunciation: —</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function showBodyPart(arabic, english, pronunciation) {
                                // Show info card with a smooth transition
                                const card = document.getElementById('info-card');
                                card.classList.add('show');

                                document.getElementById('arabic-name').innerText = arabic;
                                document.getElementById('english-name').innerText = english;
                                document.getElementById('pronunciation').innerText = `Pronunciation: ${pronunciation}`;
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Hover effect for buttons */
        .body-part-btn {
            transition: background-color 0.3s, transform 0.3s;
        }

        .body-part-btn:hover {
            background-color: #007bff;
            /* Blue background on hover */
            color: white;
            /* White text color */
            transform: scale(1.1);
            /* Slightly increase button size */
        }

        #arabic-name {
            font-size: 2.5rem;
            /* Larger font size */
            font-weight: bold;
        }

        #english-name,
        #pronunciation {
            font-size: 1.5rem;
            /* Larger font size */
        }
    </style>
@endpush
