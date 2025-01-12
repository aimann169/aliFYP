@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        @if (auth()->user()->role == 'student')

        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Alphabet & Numbers</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $alphabet ? $alphabet->marks : '0' }}/10
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder"></span>
                                        {{ $alphabet ? $alphabet->updated_at : '--' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Basic Phrases & Greetings</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $dragdrop ? $dragdrop->marks : '0' }}/9

                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder"></span>
                                        {{ $dragdrop ? $dragdrop->updated_at : '--' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Body Parts</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $memory ? $memory->marks : 'No Record' }}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-danger text-sm font-weight-bolder"></span>
                                        {{ $memory ? $memory->updated_at : '--' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endif
        @if (auth()->user()->role == 'student')
            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <h6 class="text-capitalize">Evaluation Marks</h6>
                            <p class="text-sm mb-0">
                                <span class="font-weight-bold">1-9 - low, 10-14 - medium, 15-20 - high </span>
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'lecturer')
            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card ">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Students Marks</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center ">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Evaluation Marks</th>
                                        <th>Alphabet & Numbers Marks</th>
                                        <th>Basic Phrases & Greetings Marks</th>
                                        <th>Body Parts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($students as $student)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0">Student Name:</p>
                                                    <h6 class="text-sm mb-0">{{ $student->name }} ({{ $student->matric_id }})</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0"> Marks (/20):</p>
                                                    <h6 class="text-sm mb-0">{{ ($student->evaluation) ? $student->evaluation->marks : '0' }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0">Marks (/10):</p>
                                                    <h6 class="text-sm mb-0">{{ ($student->sorting) ? $student->sorting->marks : '0' }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0">Marks (/9):</p>
                                                    <h6 class="text-sm mb-0">{{ ($student->dragdrop) ? $student->dragdrop->marks : '0' }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0">Time Taken:</p>
                                                    <h6 class="text-sm mb-0">{{ ($student->memory) ? $student->memory->marks : 'No Record' }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        @endif
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx1, {
            type: "doughnut",
            data: {
                labels: ["Score", "Unachieved Score"],
                datasets: [{
                    label: "Evaluation",
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: ["#4caf50", "#f44336"], // Green for "Score", Red for "Total Score"
                    backgroundColor: ["#4caf50", "#f44336"], // Same colors for the segments
                    borderWidth: 3,
                    data: [{{ (auth()->user()->evaluation) ? auth()->user()->evaluation->marks : 0 }}, 20 - parseInt({{ (auth()->user()->evaluation) ? auth()->user()->evaluation->marks : 0 }})],
                    maxBarThickness: 6
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true, // Display legend for clarity
                        labels: {
                            font: {
                                size: 14,
                            },
                            color: '#333', // Legend text color
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
            },
        });
    </script>
@endpush
