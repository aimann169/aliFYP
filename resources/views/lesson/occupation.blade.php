@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Occupations'])

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <!-- Your content here -->

                        <div class="container">
                            <h2>Occupations</h2>
                            <p class="text-center mb-5">Here are some occupations with their descriptions. Click on any card
                                to explore further!</p>

                            <!-- Row for Occupation Cards -->
                            <div class="row row-cols-1 row-cols-md-3 g-4">

                                <!-- Occupation Card 1 -->
                                <div class="col-4">
                                    <div class="card h-100 shadow-lg">
                                        <img class="card-img-top" src="{{ url('/img/architect.png') }}" alt="Occupation 1">
                                        <div class="card-body">
                                            <h4 class="card-title">Architect (مهندس) - Muhandis</h4>
                                            <p class="card-text">An architect designs buildings and structures, ensuring
                                                they are both functional and aesthetically pleasing.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Occupation Card 2 -->
                                <div class="col-4">
                                    <div class="card h-100 shadow-lg">
                                        <img class="card-img-top" src="{{ url('/img/police.png') }}" alt="Occupation 2">
                                        <div class="card-body">
                                            <h4 class="card-title">Police (شرطة) - Shurta</h4>
                                            <p class="card-text">A police officer enforces the law, protects citizens, and
                                                ensures public safety by maintaining order and responding to emergencies.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Occupation Card 3 -->
                                <div class="col-4">
                                    <div class="card h-100 shadow-lg">
                                        <img class="card-img-top" src="{{ url('/img/doctor.png') }}" alt="Occupation 3">
                                        <div class="card-body">
                                            <h4 class="card-title">Doctor (طبيب) - Tabib</h4>
                                            <p class="card-text">A doctor diagnoses, treats, and prevents illnesses,
                                                ensuring the health and well-being of individuals.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Occupation Card 4 -->
                                <div class="col-4">
                                    <div class="card h-100 shadow-lg">
                                        <img class="card-img-top" src="{{ url('/img/teacher.png') }}" alt="Occupation 4">
                                        <div class="card-body">
                                            <h4 class="card-title">Teacher (مُعَلِّم) - Mua'llim</h4>
                                            <p class="card-text">A teacher educates students in a variety of subjects,
                                                guiding them towards academic success and personal growth.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Occupation Card 5 -->
                                <div class="col-4">
                                    <div class="card h-100 shadow-lg">
                                        <img class="card-img-top" src="{{ url('/img/chef.jpg') }}" alt="Occupation 5">
                                        <div class="card-body">
                                            <h4 class="card-title">Chef (طَبّاخ) - Tabbah</h4>
                                            <p class="card-text">A chef prepares meals and oversees the kitchen operations
                                                to ensure quality food service.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Occupation Card 6 -->
                                <div class="col-4">
                                    <div class="card h-100 shadow-lg">
                                        <img class="card-img-top" src="{{ url('/img/pilot.png') }}" alt="Occupation 6">
                                        <div class="card-body">
                                            <h4 class="card-title">Pilot (طيار) - Tayyar</h4>
                                            <p class="card-text">A pilot flies aircraft to transport passengers and cargo
                                                safely to their destinations.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Occupation Card 7 -->
                                <div class="col-4">
                                    <div class="card h-100 shadow-lg">
                                        <img class="card-img-top" src="{{ url('/img/lawyer.jpg') }}" alt="Occupation 7">
                                        <div class="card-body">
                                            <h4 class="card-title">Lawyer (محامي) - Muhami</h4>
                                            <p class="card-text">A lawyer provides legal advice and represents clients in
                                                legal proceedings.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Occupation Card 8 -->
                                <div class="col-4">
                                    <div class="card h-100 shadow-lg">
                                        <img class="card-img-top" src="{{ url('/img/fireman.jpg') }}" alt="Occupation 8">
                                        <div class="card-body">
                                            <h4 class="card-title">Fireman (رجل إطفاء) - Rajul Itfa'</h4>
                                            <p class="card-text">A fireman extinguishes fires, rescues people, and protects
                                                property during emergencies.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Occupation Card 9 -->
                                <div class="col-4">
                                    <div class="card h-100 shadow-lg">
                                        <img class="card-img-top" src="{{ url('/img/waiter.jpg') }}" alt="Occupation 9">
                                        <div class="card-body">
                                            <h4 class="card-title">Waiter (لدﺎﻧ)</h4>
                                            <p class="card-text">A waiter serves food and beverages to customers in
                                                restaurants and ensures their satisfaction.</p>
                                        </div>
                                    </div>
                                </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush

<style>
    /* Custom styles */
    body {
        color: white;
        font-family: 'Arial', sans-serif;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 2.5rem;
        font-weight: bold;
    }

    .card {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        background-color: #f8f9fa;
        border-radius: 15px;
        padding: 20px;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 1rem;
        line-height: 1.6;
    }

    .btn-primary {
        background-color: #02a0b4;
        border: none;
        padding: 10px 20px;
        border-radius: 25px;
        text-transform: uppercase;
    }

    .btn-primary:hover {
        background-color: #005cbf;
    }

    .container {
        max-width: 1200px;
        margin-top: 50px;
    }


    
</style>
