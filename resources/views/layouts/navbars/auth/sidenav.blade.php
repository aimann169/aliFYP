<aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 animated"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
            <img src="{{ asset('img/logo.png') }}" class="navbar-brand-img" alt="main_logo">
            <span class="ms-1 font-weight-bold">ALI</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Dynamic menu inclusion -->
            @if (env('LARA_BUILD'))
                @include('sidenav')
            @endif

            <!-- Manage Section -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Menu</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                    href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-television text-primary text-sm opacity-10 pb-1" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->role != 'student')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(Route::currentRouteName(), 'user.index') ? 'active' : '' }}"
                        href="{{ route('user.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-user text-primary text-sm opacity-10 pb-1"></i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ str_contains(Route::currentRouteName(), 'profile') ? 'active' : '' }}"
                    href="{{ route('user.profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user text-primary text-sm opacity-10 pb-1"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            @if (auth()->user()->role == 'student')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(Route::currentRouteName(), 'exercise.evaluation') ? 'active' : '' }}"
                        href="{{ route('exercise.evaluation') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-book text-primary text-sm opacity-10 pb-1"></i>
                        </div>
                        <span class="nav-link-text ms-1">Evaluation</span>
                    </a>
                </li>
            @endif
            <!-- Lesson Section -->
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#lesson" class="nav-link collapsed" aria-controls="lesson"
                    role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ungroup text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lesson</span>
                </a>
                <div class="collapse" id="lesson">
                    <ul class="nav ms-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('lesson.alphabet') }}">
                                <span class="sidenav-mini-icon"> A </span>
                                <span class="sidenav-normal"> Alphabet & Numbers </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('lesson.color') }}">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal"> Color </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('lesson.lesson1') }}">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal"> Basic Phrases & Greetings </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('lesson.bodyParts') }}">
                                <span class="sidenav-mini-icon"> B </span>
                                <span class="sidenav-normal"> Body Parts </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('lesson.family') }}">
                                <span class="sidenav-mini-icon"> F </span>
                                <span class="sidenav-normal"> Family </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('lesson.months') }}">
                                <span class="sidenav-mini-icon"> M </span>
                                <span class="sidenav-normal"> Months </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('lesson.occupation') }}">
                                <span class="sidenav-mini-icon"> O </span>
                                <span class="sidenav-normal"> Occupation </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Exercise Section -->
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#exercise" class="nav-link collapsed" aria-controls="exercise"
                    role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ungroup text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Exercise</span>
                </a>
                <div class="collapse" id="exercise">
                    <ul class="nav ms-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('exercise.sorting') }}">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal"> Alphabet & Numbers </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('exercise.exercise') }}">
                                <span class="sidenav-mini-icon"> B </span>
                                <span class="sidenav-normal"> Basic Phrases & Greetings </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('exercise.memory') }}">
                                <span class="sidenav-mini-icon"> M </span>
                                <span class="sidenav-normal"> Body Parts </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('exercise.voice') }}">
                                <span class="sidenav-mini-icon"> V </span>
                                <span class="sidenav-normal"> Speaking </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            @php
                $jsonFilePath = resource_path('views/layouts/crud.json');

                $generatedItems = [];

                if (File::exists($jsonFilePath)) {
                    $generatedItems = json_decode(File::get($jsonFilePath), true);
                }
            @endphp
            @foreach ($generatedItems as $item)
                @if (in_array(auth()->user()->role, $item['role']))
                    <li class="nav-item">
                        <a class="nav-link {{ str_contains(Route::currentRouteName(), $item['route']) ? 'active' : '' }}"
                            href="{{ route($item['route'] . '.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa {{ $item['icon'] }} text-primary text-sm opacity-10 pb-1"
                                    aria-hidden="true"></i>
                            </div>
                            <span class="nav-link-text ms-1">{{ $item['name'] }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</aside>
