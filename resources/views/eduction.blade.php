@extends('layout.multistepbas')
@section('title', 'Step 2')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/css/tempus-dominus.min.css" rel="stylesheet" crossorigin="anonymous" />
@endsection

@section('content')
<div class="row">
    <div class="col-md-2 dark">
        <div class="container mt-5">
            <div class="progress-section">
                <a href="">Step 2</a>
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="container">
            <form id="multiStepForm" method="POST" action="{{ route('validateStep2') }}">
                @csrf

                <h1>What’s your Education?</h1>

                <div class="row">
                    <div class="col-md-6">
                        <label for="school_name">School Name *</label>
                        <input type="text" name="eduction[0][school_name]" id="school_name" class="form-control" value="{{ old('school_name') }}">
                        @error('eduction.0.school_name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="school_location">School Location</label>
                        <input type="text" name="eduction[0][school_location]" id="school_location" class="form-control" value="{{ old('school_location') }}">
                        @error('eduction.0.school_location')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="degree">Degree</label>
                        <input type="text" name="eduction[0][degree]" id="degree" class="form-control" value="{{ old('degree') }}">
                       @error('eduction.0.degree')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="study">Field of Study</label>
                        <input type="text" name="eduction[0][study]" id="study" class="form-control" value="{{ old('study') }}">
                        @error('eduction.0.study')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="passing_year">Passing Year</label>
                        <div class="input-group" id="passing_year_picker" data-td-target-input="nearest" data-td-target-toggle="nearest" data-td-target="#passing_year_picker" >
                            <input type="text" name="eduction[0][passing_year]" id="passing_year" class="form-control" data-td-target="#passing_year_picker" value="{{ old('passing_year') }}">
                            <span class="input-group-text" data-td-toggle="datetimepicker" data-td-target="#passing_year_picker">
                                <i class="fa-solid fa-calendar"></i>
                            </span>
                        </div>
                        @error('eduction.0.passing_year')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/js/tempus-dominus.min.js" crossorigin="anonymous"></script>
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
