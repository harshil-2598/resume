@extends('layout.multistepbas')
@section('title', 'Step 1')

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
                                <input type="text" name="fname" id="fname" class="form-control">
                                @error('fname')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="lname">Last Name*</label>
                                <input type="text" name="lname" id="lname" class="form-control">
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
                                <input type="text" name="contact" id="contact" class="form-control">
                                @error('contact')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="Profession">Profession*</label>
                                <input type="text" name="Profession" id="Profession" class="form-control">
                                @error('Profession')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="city">City*</label>
                                <input type="text" name="city" id="city" class="form-control">
                                @error('city')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="country">Country*</label>
                                <input type="text" name="country" id="country" class="form-control">
                                @error('country')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="pincode">Pin Code*</label>
                                <input type="text" name="pincode" id="pincode" class="form-control">
                                @error('pincode')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Optional Additional Information -->
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <label for="linked_in" class="form-label">Linked In</label>
                                <input type="text" name="linked_in" id="linked_in" class="form-control">
                            </div>


                            <div class="col-md-3">
                                <label for="website" class="form-label">website</label>
                                <input type="text" name="website" id="website" class="form-control">
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
    </script>
@endsection
