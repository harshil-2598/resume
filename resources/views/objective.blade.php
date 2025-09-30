@extends('layout.multistepbas')
@section('title', 'Sumary And Objective')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 dark">
            <div class="container">
                <div class="progress-section mt-5">
                    <a href="">Step 1</a>
                </div>
            </div>
        </div>

        <div class="col-md-10">
            <div class="container">
                <form id="multiStepForm" class="form-group" method="POST" enctype="multipart/form-data"
                    action="{{ route('addSummary') }}">
                    @csrf
                    <div class="step active" id="step1">
                        <h1>Professional Summary</h1>
                        <h3>
                            Choose from our pre-written examples below or write your own.
                        </h3>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="description" class="form-label fw-bolder">Professional Summary</label>
                                <textarea name="summary" id="summary" class="form-control" cols="50" rows="10"></textarea>
                            </div>

                            <div class="col-md-6 m-2 p-2">
                                <textarea name="summary" id="objective" class="form-control" cols="50" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="skills" class="form-label fw-bolder">Enter Skills:</label>
                                <select class="form-control" id="skills" name="skills[]" multiple="multiple"
                                    aria-placeholder="Example:php devloper "></select>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6 col-sm-12">
                                <div class="text-start">
                                    <a href="{{ url()->previous() }}" class="btn btn-warning rounded-pill">Previous</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success rounded-pill">Next</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            GetObjectiveFromAi();
        });

        ClassicEditor
            .create(document.querySelector('#summary'))
            .catch(error => {
                console.error(error);
            });

        $(document).ready(function() {
            $('#skills').select2({
                tags: true, // allow user to add custom values
                tokenSeparators: [','], // create tag when user types comma or space
                placeholder: "Example:php devloper",
                width: '100%'
            });
        });

        function GetObjectiveFromAi() {
            // safer way to inject session variable
            let profession = @json(session('data.Profession', null));

            if (!profession) {
                alert("No profession provided. Skipping AI call.");
                return;
            }

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
