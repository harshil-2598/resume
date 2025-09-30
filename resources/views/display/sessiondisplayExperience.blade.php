@extends('layout.multistepbas')
@section('title', 'Step 2')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/css/tempus-dominus.min.css" rel="stylesheet"
        crossorigin="anonymous" />
@endsection

@section('content')
    <div class="row">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="col-md-2 dark">
            <div class="container mt-5">
                <div class="progress-section">

                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="container">
                <h5 class="card-title p-5">Experience History</h5>



                @foreach ($expe as $index => $ex)
                    <div class="card mt-2 p-3 boreder rounded">
                        <div class="card-body">
                            <div class="position-absolute top-0 start-0 bg-light border-end px-3 py-1 rounded-end"
                                style="font-weight: bold;">
                                {{ $index + 1 }}
                            </div>

                            <div class="mt-2">
                                <p><strong>Job Title:</strong> {{ $ex['job_title'] }}</p>
                                <p><strong>Employer:</strong> {{ $ex['employer'] }}</p>
                                <p><strong>Location:</strong> {{ $ex['location'] }}</p>
                                <p><strong>Passing Year:</strong>
                                    {{ \Carbon\Carbon::parse($ex['start_date'])->format('d-m-y') }}</p>
                            </div>

                            <form action="{{ route('deleteExpSession') }}" method="POST"
                                class="position-absolute top-0 end-0 m-2">
                                @csrf
                                <input type="hidden" name="index" value="{{ $index }}">
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                            <a href="{{ route('step2') }}" class="position-absolute top-0 m-2 bg-light"><i
                                    class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                @endforeach

                <div class="text-end mt-4">
                    <a href="{{ route('step3') }}" class="btn btn-warning rounded-start-pill">
                        <i class="fa-solid fa-plus"></i> Add More Experience
                    </a>
                </div>

                <div class="text-end mt-4">
                    <a href="{{ route('step4') }}" class="btn btn-dark rounded-start-pill">
                        <i class="fa-solid fa-plus"></i> Next
                    </a>
                </div>

                {{-- <div class="mt-4 text-end">
                    <button type="button" name="saveBtn" onclick="DirectlySaveData()" class="btn btn-success rounded-pill">Save and
                        Continue</button>
                </div> --}}


            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/js/tempus-dominus.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            GetObjectiveFromAi();
        });

        new tempusDominus.TempusDominus(document.getElementById('passing_year_picker'), {
            display: {
                components: {
                    calendar: true,
                    date: false,
                    month: true,
                    year: true,
                    decades: true,
                    clock: false,
                }
            },
            localization: {
                format: 'MM/yyyy'
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            xhrFields: {
                withCredentials: true // 🔐 Ensures session cookie is sent
            }
        });

        function DirectlySaveData() {
            // let formData = $("#multiStepForm").serialize(); // serialize all form data including CSRF token

            $.ajax({
                type: 'POST',
                url: '{{ route('SaveData') }}',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    // Replace this with proper handling
                    if (data.success) {
                        window.location.href = "{{ route('chooseTemplate') }}";
                    }
                },
                error: function(xhr) {
                    console.error(xhr);
                    let response = xhr.responseJSON;
                    if (response && response.errors) {
                        let errorMessages = Object.values(response.errors).flat().join('<br>');
                        alert("Validation Error:\n" + errorMessages);
                        setTimeout(() => {
                            window.location.href = "{{ route('home') }}";
                        }, 2000);
                    } else {
                        alert("An error occurred while saving.");
                    }
                }
            });
        }



        function GetObjectiveFromAi() {
            // safer way to inject session variable
            let profession = @json(session('data.Profession'));

            $.ajax({
                method: 'POST',
                url: "{{ route('GetObjectiveFromAi') }}",
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    profession: profession
                },
                success: function(result) {
                    console.log("Response from AI:", result);
                },
                error: function(xhr, status, error) {
                    console.error("Ajax error:", error);
                    console.log(xhr.responseText);
                }
            });
        }
    </script>
@endsection
