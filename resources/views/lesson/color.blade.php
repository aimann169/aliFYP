@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Colour '])

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    
                    <div class="card-body p-3 d-flex flex-column justify-content-center align-items-center">
                        <!-- Your content starts here -->
                        <div class="container my-5 text-center">
                            <h1 class="text-center">Learn About Colour</h1>
                            <p class="text-muted">Click on each colour to learn about the names and pronunciation</p>
                        </div>

                        <!-- Color Chart -->
                        <div class="color-chart">
                            <div class="color-box" style="background-color: #FF0000" data-color-name="أحمر"
                                data-color-name-en="Red" data-pronunciation="Aḥmar">
                                <span class="color-name"></span>
                                <span class="pronunciation"></span>
                            </div>
                            <div class="color-box" style="background-color: #0000FF" data-color-name="أزرق"
                                data-color-name-en="Blue" data-pronunciation="Azraq">
                                <span class="color-name"></span>
                                <span class="pronunciation"></span>
                            </div>
                            <div class="color-box" style="background-color: #008000" data-color-name="أخضر"
                                data-color-name-en="Green" data-pronunciation="Akhḍar">
                                <span class="color-name"></span>
                                <span class="pronunciation"></span>
                            </div>
                            <div class="color-box yellow-text" style="background-color: #FFFF00" data-color-name="أصفر"
                                data-color-name-en="Yellow" data-pronunciation="Aṣfar">
                                <span class="color-name"></span>
                                <span class="pronunciation"></span>
                            </div>
                            <div class="color-box" style="background-color: #000000" data-color-name="أسود"
                                data-color-name-en="Black" data-pronunciation="Aswad">
                                <span class="color-name"></span>
                                <span class="pronunciation"></span>
                            </div>
                            <div class="color-box white-text" style="background-color: #FFFFFF" data-color-name="أبيض"
                                data-color-name-en="White" data-pronunciation="Abyad">
                                <span class="color-name"></span>
                                <span class="pronunciation"></span>
                            </div>
                            <div class="color-box" style="background-color: #FFA500" data-color-name="برتقالي"
                                data-color-name-en="Orange" data-pronunciation="Burtuqāli">
                                <span class="color-name"></span>
                                <span class="pronunciation"></span>
                            </div>
                            <div class="color-box" style="background-color: #7b31b8" data-color-name="بنفسجي"
                                data-color-name-en="Purple" data-pronunciation="Banafsajī">
                                <span class="color-name"></span>
                                <span class="pronunciation"></span>
                            </div>
                        </div>
                        <!-- Your content ends here -->
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
@endsection

    <style>
        /* Centering styles for the card-body */
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .color-chart {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin: 20px;
            max-width: 1200px;
            width: 100%;
        }

        .color-box {
            height: 150px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            font-size: 22px;
        }

        .color-box:hover {
            transform: scale(1.1);
        }

        .color-name {
            font-size: 18px;
            color: white;
            font-weight: bold;
            position: absolute;
        }

        .pronunciation {
            font-size: 14px;
            color: white;
            position: absolute;
            bottom: 10px;
        }

        .yellow-text .color-name,
        .white-text .color-name {
            color: black;
        }

        .yellow-text .pronunciation,
        .white-text .pronunciation {
            color: black;
        }
    </style>


@push('js')
    <script>
        document.querySelectorAll('.color-box').forEach(function(colorBox) {
            colorBox.addEventListener('click', function() {
                const colorNameArabic = colorBox.getAttribute('data-color-name');
                const colorNameEnglish = colorBox.getAttribute('data-color-name-en');
                const pronunciation = colorBox.getAttribute('data-pronunciation');

                const colorNameElement = colorBox.querySelector('.color-name');
                const pronunciationElement = colorBox.querySelector('.pronunciation');
                colorNameElement.innerHTML = `${colorNameArabic} (${colorNameEnglish})`;
                pronunciationElement.innerHTML = `Pronounced: ${pronunciation}`;
            });
        });
    </script>
@endpush
