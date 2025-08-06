
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


                <form id="multiStepForm" class="form-group" method="POST" enctype="multipart/form-data">
                    <!-- Step 1 -->
                    @if($currentStep === 1)
                    <div class="row setup-content" id="step-1">
                        <div class="step active" id="step1">
                            <h1>What’s the best way for employers to contact you?</h1>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" wire:model="firstname" class="form-control" required>
                                    @error('firstname')<span class="texxt-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" wire:model="lastname" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="contact">Contact Number</label>
                                    <input type="text" name="contact" id="contact"  wire:model="contactNum" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="Profession">Profession</label>
                                    <input type="text" name="Profession" id="Profession"  wire:model="profession" class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city"  wire:model="city" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" id="country" wire:model="country" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="pincode">Pin Code</label>
                                    <input type="text" name="pincode" id="pincode" wire:model="pincode" class="form-control" required>
                                </div>
                            </div>

                            <div class="mt-4 text-end">
                                {{-- <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button> --}}
                                <button class="btn btn-primary nextBtn mt-3 pull-right" type="button"
                                    wire:click="firstStepSubmit">Next</button>
                                <button class="btn btn-danger nextBtn mt-3 pull-right" type="button"
                                    wire:click="back(1)">Back</button>
                            </div>
                        </div>
                    </div>
                    @endif

                    
                </form>
            </div>
        </div>
    </div>

   
