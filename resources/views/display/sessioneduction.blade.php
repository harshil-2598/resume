@extends('layout.multistepbas')
@section('title', 'Step 2')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/css/tempus-dominus.min.css" rel="stylesheet"
        crossorigin="anonymous" />
@endsection

@section('content')
    <div class="row sidebar">
        <div class="col-md-2 dark">
            <div class="container mt-5">
                <div class="progress-section">

                </div>
            </div>
        </div>
        <div class="col-md-10">

            <div class="row">
                <div class="col-md-12">
                    <div class="taxt-center">
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
                    </div>
                </div>
            </div>
            <div class="container">
                <h5 class="card-title p-5">Education History</h5>



                @foreach ($education as $index => $edu)
                    <div class="card mt-2 p-3 boreder rounded">
                        <div class="card-body">
                            <div class="position-absolute top-0 start-0 bg-light border-end px-3 py-1 rounded-end"
                                style="font-weight: bold;">
                                {{ $index + 1 }}
                            </div>

                            <div class="mt-2">
                                <p><strong>School Name:</strong> {{ $edu['school_name'] }}</p>
                                <p><strong>Location:</strong> {{ $edu['school_location'] }}</p>
                                <p><strong>Degree:</strong> {{ $edu['degree'] }}</p>
                                <p><strong>Field of Study:</strong> {{ $edu['study'] }}</p>
                                <p><strong>Passing Year:</strong>
                                    {{ \Carbon\Carbon::parse($edu['passing_year'])->format('F Y') }}</p>
                            </div>

                            <form action="{{ route('deleteEduItem') }}" method="POST"
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
                    <a href="{{ route('step2') }}" class="btn btn-warning rounded-start-pill">
                        <i class="fa-solid fa-plus"></i> Add More Education
                    </a>
                </div>

                <div class="text-end mt-4">
                    <a href="{{ route('step3') }}" class="btn btn-dark rounded-start-pill">
                        <i class="fa-solid fa-plus"></i> Next Step
                    </a>
                </div>


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
    </script>
@endsection
