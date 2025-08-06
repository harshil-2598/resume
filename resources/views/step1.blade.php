@extends('layout.multistepbas')
@section('title','Step 1')
    
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
               

                <form id="multiStepForm" class="form-group" method="POST" enctype="multipart/form-data" action="{{ route('validateStep1') }}">
                    <!-- Step 1 -->
                    @csrf
                    <div class="step active" id="step1">
                        <h1>What’s the best way for employers to contact you?</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control" >
                                @error('fname')<span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control" >
                                @error('lname')<span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="email">Email Id</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="contact">Contact Number</label>
                                <input type="text" name="contact" id="contact" class="form-control" >
                                @error('contact')<span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="Profession">Profession</label>
                                <input type="text" name="Profession" id="Profession" class="form-control" >
                                @error('Profession')<span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" class="form-control" >
                                @error('city')<span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-4">
                                <label for="country">Country</label>
                                <input type="text" name="country" id="country" class="form-control" >
                                @error('country')<span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-4">
                                <label for="pincode">Pin Code</label>
                                <input type="text" name="pincode" id="pincode" class="form-control" >
                                @error('pincode')<span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            {{-- <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button> --}}
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step" id="step2">
                        <h1>Get Your work history</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="extra">Extra Info (Example)</label>
                                <input type="text" name="extra" id="extra" class="form-control">
                            </div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection