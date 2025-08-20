@extends('layout.multistepbas')
@section('title', 'Experience')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/css/tempus-dominus.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2 dark">
            <div class="container mt-5">
                <div class="progress-section">
                    <a href="javascript:void(0)" class="btn btn-sm text-white">Step 3</a>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="container">
                <form id="multiStepForm" method="POST" action="{{ route('validateStep3') }}">
                    @csrf

                    <h1>What’s your Experience?</h1>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="job_title">Job Title *</label>
                            <input type="text" name="expe[0][job_title]" id="job_title" class="form-control"
                                value="{{ old('job_title') }}">
                            @error('expe.0.job_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="employer">Employer *</label>
                            <input type="text" name="expe[0][employer]" id="employer" class="form-control"
                                value="{{ old('employer') }}">
                            @error('expe.0.employer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="location">Location</label>
                            <input type="text" name="expe[0][location]" id="location" class="form-control"
                                value="{{ old('location') }}">
                            @error('expe.0.location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="start_date">Start Date</label>
                            <div class="input-group" id="" data-td-target-input="nearest"
                                data-td-target-toggle="nearest" data-td-target="#end_date">
                                <input type="text" name="expe[0][start_date]" id="start_date" class="form-control"
                                    data-td-target="" value="{{ old('start_date') }}" autocomplete="off">
                                <span class="input-group-text" data-td-toggle="datetimepicker" data-td-target="#end_date">
                                    <i class="fa-solid fa-calendar"></i>
                                </span>
                            </div>
                            @error('expe.0.start_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="working_end_date">End Date</label>
                            <div class="input-group" id="" data-td-target-input="nearest" data-td-target-toggle="nearest" data-td-target="#">
                                <input type="text" name="expe[0][working_end_date]" id="working_end_date"
                                    class="form-control" data-td-target="#working_end_date"
                                    value="{{ old('working_end_date') }}" autocomplete="off">
                                <span class="input-group-text" data-td-toggle="datetimepicker" data-td-target="#end_date">
                                    <i class="fa-solid fa-calendar"></i>
                                </span>
                            </div>
                            @error('expe.0.working_end_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mt-2">
                                <input type="checkbox" name="currently_working" id="currently_working"
                                    class="form-check-input">
                                <label for="currently_working">Currently Working</label>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="job_description">Job Description</label>
                            <textarea name="job_description" id="job_description" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                    </div> --}}
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="expe[0][job_description]" id="job_description" class="form-control" cols="50" rows="10"></textarea>
                        </div>

                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary rounded-pill">Next</button>
                    </div>
                    {{-- <div class="mt-4 text-end">
                        <button type="button" name="saveBtn" onclick="DirectlySaveData()" class="btn btn-primary">Save and
                            Continue</button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>

    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="false">
        <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/js/tempus-dominus.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        // new tempusDominus.TempusDominus(document.getElementById('end_date'), {
        //     display: {
        //         components: {
        //             calendar: true,
        //             date: false,
        //             month: true,
        //             year: true,
        //             decades: true,
        //             clock: false,
        //         }
        //     },
        //     localization: {
        //         format: 'MM/yyyy'
        //     }
        // });

        // const quill = new Quill('#job_description', {
        //     theme: 'snow'
        // });

        ClassicEditor
            .create(document.querySelector('#job_description'))
            .catch(error => {
                console.error(error);
            });

        $(document).ready(function() {
            $("#start_date").datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true, // Enables month dropdown
                changeYear: true, // Enables year dropdown
                yearRange: "1950:2050" // Customize as needed
            });

            $("#working_end_date").datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true, // Enables month dropdown
                changeYear: true, // Enables year dropdown
                yearRange: "1950:2050" // Customize as needed
            });
        });

        $(document).ready(function() {
            $('#currently_working').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#working_end_date').prop('disabled', true);
                } else {
                    $('#working_end_date').prop('disabled', false);
                }
            });
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
                    } else {
                        alert("An error occurred while saving.");
                    }
                }
            });
        }
    </script>
@endsection
