@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Evaluation'])

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2 class="text-center mb-4 text-primary">Quiz</h2>
                @foreach ($questions as $index => $question)
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header bg-warning text-white">
                            <strong style="font-size: 1.5rem;">Question {{ $index + 1 }}</strong>
                        </div>
                        <div class="card-body">
                            <p class="h5">{{ $question['text'] }}</p>
                            @foreach ($question['options'] as $key => $option)
                                <div class="form-check mb-3 d-flex align-items-center">
                                    <input class="form-check-input me-2" type="radio" name="answers[{{ $index }}]"
                                        id="question{{ $index }}_option{{ $key }}"
                                        value="{{ $key }}" style="transform: scale(1);"
                                        {{ is_array(old('answers')) && isset(old('answers')[$index]) && old('answers')[$index] == $key ? 'checked' : '' }}>
                                    <label class="form-check-label me-2"
                                        for="question{{ $index }}_option{{ $key }}">
                                        {{ $option }}
                                    </label>
                                </div>
                            @endforeach
                            <input type="hidden" id="answer-{{ $index }}"
                                value="{{ $question['correct_answer'] }}">
                        </div>
                    </div>
                @endforeach

                <div class="d-flex justify-content-center mt-4">
                    <button type="button" onclick="submitQuiz('{{ route('evaluation.store') }}')" class="btn btn-success btn-lg">Submit Quiz</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function submitQuiz(url) {
            var correctAnswer = 0;
            var questions = @json($questions);
            let index = 0;
            questions.forEach(element => {
                if ($(`input[name="answers[${index}]"]:checked`).val() == element.correct_answer) {
                    correctAnswer++;
                }
                index++;
            });
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2A2A2A',
                cancelButtonColor: '#008080',
                confirmButtonText: 'Yes, submit it!',
                preConfirm: (input) => {
                    return fetch(url, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                _token: "{{ csrf_token() }}",
                                marks: correctAnswer
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            return response.json()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(`Request failed: ${error}`)
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Submitted!',
                        'The evaluation has been submit.',
                        'success'
                    )
                    setTimeout(() => {
                        window.location.href = "{{ route('home') }}";
                    }, 2000);
                }
            })
        }
    </script>
@endpush
