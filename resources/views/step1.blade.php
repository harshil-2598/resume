@extends('layout.multistepbas')
@section('title', 'Step 1')
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
    <div class="row sidebar">
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
                    action="{{ route('validateStep1') }}">
                    @csrf
                    <div class="step active" id="step1">
                        <h1>What's the best way for employers to contact you?</h1>

                        <!-- Image Upload Section -->
                        <div class="row mt-3 mb-4">
                            <div class="col-md-12">
                                <label for="profile_image">Profile Image (Optional)</label>
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <!-- Display placeholder or existing image -->
                                        <img id="imagePreview" src="{{ asset('user/images/Default_pfp.jpg') }}"
                                            alt="Profile Image" class="rounded-circle border"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="file" name="profile_image" id="profile_image" class="form-control"
                                            accept="image/*">
                                        <small class="text-muted">We recommend a professional headshot (max 2MB)</small>
                                        @error('profile_image')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="fname">First Name*</label>
                                <input type="text" name="fname" id="fname" class="form-control"
                                    value="{{ old('fname') }}">
                                @error('fname')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="lname">Last Name*</label>
                                <input type="text" name="lname" id="lname" class="form-control"
                                    value="{{ old('lname') }}">
                                @error('lname')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="email">Email Id*</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}">
                                @error('email')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="contact">Contact Number*</label>
                                <input type="text" name="contact" id="contact" class="form-control"
                                    value="{{ old('contact') }}">
                                @error('contact')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="Profession">Profession*</label>
                                <input type="text" name="Profession" id="Profession" class="form-control"
                                    value="{{ old('Profession') }}">
                                @error('Profession')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="city">City*</label>
                                <input type="text" name="city" id="city" class="form-control"
                                    value="{{ old('city') }}">
                                @error('city')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="country">Country*</label>
                                <input type="text" name="country" id="country" class="form-control"
                                    value="{{ old('country') }}">
                                @error('country')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="pincode">Pin Code*</label>
                                <input type="text" name="pincode" id="pincode" class="form-control"
                                    value="{{ old('pincode') }}">
                                @error('pincode')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mt-3">

                            <div class="col-md-4">
                                <label for="gender" class="fw-bolder">Gender</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                        value="male" {{ old('gender', session('gender')) == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                        value="Female"
                                        {{ old('gender', session('gender')) == 'Female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio3"
                                        value="other" {{ old('gender', session('gender')) == 'other' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio3">Other</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="gender fw-bolder">Birth Date</label>
                                <div class="input-group" id="" data-td-target-input="nearest"
                                    data-td-target-toggle="nearest" data-td-target="#birth_date">
                                    <input type="text" name="birth_date" id="birth_date" class="form-control"
                                        data-td-target="" autocomplete="off">
                                    <span class="input-group-text" data-td-toggle="datetimepicker"
                                        data-td-target="#birth_date">
                                        <i class="fa-solid fa-calendar"></i>
                                    </span>
                                    @error('birth_date')
                                        <span class="text-danger error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="marital_status">Marital Status</label>
                                <select class="form-select" name="marital_status" id="marital_status">
                                    <option value="unmarried" selected>Unmarried</option>
                                    <option value="married">Married</option>
                                </select>
                                @error('marital_status')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                                {{-- <input type="text" name="marital_status" id="marital_status" class="form-control"
                                value="{{ old('marital_status') }}"> --}}
                            </div>
                        </div>

                        <!-- Optional Additional Information -->
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <label for="linked_in" class="form-label">Linked In</label>
                                <input type="text" name="linked_in" id="linked_in" class="form-control"
                                    value="{{ old('linked_in') }}">
                                @error('linked_in')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-3">
                                <label for="website" class="form-label">website</label>
                                <input type="text" name="website" id="website" class="form-control"
                                    value="{{ old('website') }}">
                                @error('website')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript for image preview -->
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/js/tempus-dominus.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script>
        document.getElementById('profile_image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const defaultImage = "{{ asset('images/default-profile.png') }}";

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = defaultImage;
            }
        });

        $(document).ready(function() {
            $("#birth_date").datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true, // Enables month dropdown
                changeYear: true, // Enables year dropdown
                yearRange: "1950:2050" // Customize as needed
            });

        });
    </script>
@endsection
