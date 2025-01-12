@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@stack('css')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Alphabet and Numbers'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">

                    <div class="card-body p-3">
                        <!-- Alphabet Content -->
                        <div class="container py-5">
                            <h1 class="text-center display-4 mb-5">Alphabet</h1>
                            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">
                                @php
                                    $alphabets = [
                                        ['letter' => 'ا', 'pronunciation' => 'Alif'],
                                        ['letter' => 'ب', 'pronunciation' => 'Ba'],
                                        ['letter' => 'ت', 'pronunciation' => 'Ta'],
                                        ['letter' => 'ث', 'pronunciation' => 'Tha'],
                                        ['letter' => 'ج', 'pronunciation' => 'Jim'],
                                        ['letter' => 'ح', 'pronunciation' => 'Ha'],
                                        ['letter' => 'خ', 'pronunciation' => 'Kha'],
                                        ['letter' => 'د', 'pronunciation' => 'Dal'],
                                        ['letter' => 'ذ', 'pronunciation' => 'Dzal'],
                                        ['letter' => 'ر', 'pronunciation' => 'Ra'],
                                        ['letter' => 'ز', 'pronunciation' => 'Zai'],
                                        ['letter' => 'س', 'pronunciation' => 'Sin'],
                                        ['letter' => 'ش', 'pronunciation' => 'Syin'],
                                        ['letter' => 'ص', 'pronunciation' => 'Shod'],
                                        ['letter' => 'ض', 'pronunciation' => 'Dhad'],
                                        ['letter' => 'ط', 'pronunciation' => 'Tho'],
                                        ['letter' => 'ظ', 'pronunciation' => 'Zho'],
                                        ['letter' => 'ع', 'pronunciation' => 'Ain'],
                                        ['letter' => 'غ', 'pronunciation' => 'Ghin'],
                                        ['letter' => 'ف', 'pronunciation' => 'Fa'],
                                        ['letter' => 'ق', 'pronunciation' => 'Qaf'],
                                        ['letter' => 'ك', 'pronunciation' => 'Kaf'],
                                        ['letter' => 'ل', 'pronunciation' => 'Lam'],
                                        ['letter' => 'م', 'pronunciation' => 'Mim'],
                                        ['letter' => 'ن', 'pronunciation' => 'Nun'],
                                        ['letter' => 'و', 'pronunciation' => 'Wau'],
                                        ['letter' => 'ه', 'pronunciation' => 'Ha'],
                                        ['letter' => 'ي', 'pronunciation' => 'Ya'],
                                        ['letter' => 'ء', 'pronunciation' => 'Hamzah'],
                                        ['letter' => 'ﻻ', 'pronunciation' => 'Lam alif'],
                                    ];
                                @endphp

                                @foreach ($alphabets as $alphabet)
                                    <div class="col">
                                        <div class="card letter-card h-100 shadow-sm">
                                            <div class="card-body text-center">
                                                <div class="letter">{{ $alphabet['letter'] }}</div>
                                                <div class="pronunciation">{{ $alphabet['pronunciation'] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Numbers Content -->
                            <h1 class="text-center display-4 my-5">Numbers</h1>
                            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">
                                @php
                                    $numbers = [
                                        ['number' => '١', 'pronunciation' => 'Wahid'],
                                        ['number' => '٢', 'pronunciation' => 'Ithnain'],
                                        ['number' => '٣', 'pronunciation' => 'Thalatha'],
                                        ['number' => '٤', 'pronunciation' => 'Arba’a'],
                                        ['number' => '٥', 'pronunciation' => 'Khamsa'],
                                        ['number' => '٦', 'pronunciation' => 'Sitta'],
                                        ['number' => '٧', 'pronunciation' => 'Sab’a'],
                                        ['number' => '٨', 'pronunciation' => 'Thamaniya'],
                                        ['number' => '٩', 'pronunciation' => 'Tis’a'],
                                        ['number' => '١٠', 'pronunciation' => 'Ashara'],
                                    ];
                                @endphp

                                @foreach ($numbers as $number)
                                    <div class="col">
                                        <div class="card letter-card h-100 shadow-sm">
                                            <div class="card-body text-center">
                                                <div class="number">{{ $number['number'] }}</div>
                                                <div class="pronunciation">{{ $number['pronunciation'] }}</div>
                                            </div>
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

<style>
    .card-body {
        direction: rtl;
        /* Set text direction to right-to-left */
    }

    .letter-card {
        background-color: #f9f7f3;
        /* Light beige color */
        border: 2px solid #ffd700;
        /* Gold border */
        border-radius: 15px;
        /* Rounded corners */
        transition: transform 0.3s, box-shadow 0.3s;

    }

    .letter-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        background-color: #fff8e1;
        /* Light yellow on hover */
    }

    .letter,
    .number {
        font-size: 2rem;
        /* Larger font size */
        font-weight: bold;
        color: #2c3e50;
        /* Dark text color */
    }
</style>

@push('js')
    <script>
        // Add your custom JavaScript here if needed
    </script>
@endpush
