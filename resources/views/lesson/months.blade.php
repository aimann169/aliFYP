@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Hijri Months and Seasons'])

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <!-- Your content here -->



                        <div class="container py-5">
                            <h1 class="text-center mb-4">🌙 Learn Islamic Months and Seasons in Arabic 🌴</h1>

                            <!-- Islamic Months Section -->
                            <div class="row text-center flex-row-reverse">
                                <h2 class="mb-3">📅 Islamic Months</h2>
                                @php
                                    $months = [
                                        ['محرم', 'Muharram'],
                                        ['صفر', 'Safar'],
                                        ['ربيع الأول', 'Rabi’ ul-Awwal'],
                                        ['ربيع الآخر', 'Rabi’ ul-Akhir'],
                                        ['جمادى الأولى', 'Jamada al-Awwal'],
                                        ['جمادى الآخرة', 'Jamada al-Akhir'],
                                        ['رجب', 'Rajab'],
                                        ['شعبان', 'Sha’aban'],
                                        ['رمضان', 'Ramadhan'],
                                        ['شوال', 'Shawal'],
                                        ['ذو القعدة', 'Dzul Qa’dah'],
                                        ['ذو الحجة', 'Dzul Hijjah'],
                                    ];
                                @endphp
                                @foreach ($months as $index => [$arabic, $transliteration])
                                    <div class="col-md-3 col-sm-6 mb-4">
                                        <div class="card month-card shadow-sm">
                                            <div class="month-number">{{ $index + 1 }}</div>
                                            <div class="card-body">
                                                <p class="arabic-text mb-1">{{ $arabic }}</p>
                                                <p class="transliteration">({{ $transliteration }})</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <hr class="my-5">

                            <!-- Seasons Section -->
                            <div class="row text-center">
                                <h2 class="mb-3">☀️ Seasons of the Year</h2>
                                @php
                                    $seasons = [
                                        ['الربيع', 'Al-Rabee', 'Spring 🌸'],
                                        ['الصيف', 'Al-Sayf', 'Summer ☀️'],
                                        ['الخريف', 'Al-Khareef', 'Autumn 🍂'],
                                        ['الشتاء', 'Al-Shitaa', 'Winter ❄️'],
                                    ];
                                @endphp
                                @foreach ($seasons as [$arabic, $transliteration, $english])
                                    <div class="col-md-6 col-sm-12 mb-4">
                                        <div class="card season-card shadow-sm">
                                            <div class="card-body">
                                                <p class="arabic-text mb-1">{{ $arabic }}</p>
                                                <p class="transliteration">({{ $transliteration }})</p>
                                                <p class="text-muted">{{ $english }}</p>
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

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush

<style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .arabic-text {
        font-size: 1.5rem;
        font-weight: bold;
        direction: rtl;
    }

    .transliteration {
        font-size: 1rem;
        color: #555;
    }

    .month-card,
    .season-card {
        position: relative;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;

    }

    .month-number {
        position: absolute;
        top: 10px;
        right: 15px;
        background-color: #ffc107;
        color: #000;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 50%;
    }

    .month-card:hover,
    .season-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        background-color: #fff8e1;
        /* Keep the color on hover */
    }

    /* Card body background change on hover */
    .card-body {
        transition: background-color 0.3s;
    }

    .month-card:hover .card-body,
    .season-card:hover .card-body {
        background-color: #fff8e1;
        /* Card body background remains on hover */
    }
</style>
