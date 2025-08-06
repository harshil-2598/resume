
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
                

                @if($currentStep === 2)
                <!-- Step 2 -->
                <div class="row">
                    <div class="col-md-12">
                        <h1>Test</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="jobitle">Job Title</label>
                        <input type="text" name="jobitle" id="jobitle" wire:model="jobitle" class="form-control" >
                        @error('jobitle')<span class="texxt-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="employer">Employer </label>
                        <input type="text" name="employer" id="employer" wire:model="employer" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="location">Location </label>
                        <input type="text" name="location" id="location" wire:model="location" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="salary">Start Date</label>
                        <input type="date" name="start_date" id="start_date" wire:model="start_date" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="salary">End Date</label>
                        <input type="date" name="end_date" id="end_date" wire:model="end_date" class="form-control">
                    </div>
                </div>


                <div class="mt-4 text-end">
                    {{-- <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button> --}}

                    <button class="btn btn-danger nextBtn mt-3 pull-right" type="button"
                        wire:click="back(1)">Back</button>

                    <button class="btn btn-primary nextBtn mt-3 pull-right" type="button"
                        wire:click="firstStepSubmit">Next</button>
                    
                </div>

                @endif
            </form>
        </div>
    </div>
</div>


