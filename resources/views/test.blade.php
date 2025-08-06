<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Step Form</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @livewireStyles
    <style>
        .dark {
            background-color: #07142b;
            height: 800px;
        }

        h1 {
            margin: 50px 0px 25px 0px;
            padding: 25px;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }
    </style>
</head>

<body>

    <livewire:multistep />
    <livewire:multi-step2/>

</body>


 <!-- JS Libraries -->
 <script src="{{ asset('assets/js/vendor/jquery-3.6.2.min.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script>
 @livewireScripts
 <script>
     // let currentStep = 0;
     // const steps = $(".step");

     // function showStep(index) {
     //     steps.removeClass("active");
     //     steps.eq(index).addClass("active");
     // }

     // function nextStep() {
     //     if ($("#multiStepForm").valid()) {
     //         if (currentStep < steps.length - 1) {
     //             currentStep++;
     //             showStep(currentStep);
     //         }
     //     }
     // }

     // function prevStep() {
     //     if (currentStep > 0) {
     //         currentStep--;
     //         showStep(currentStep);
     //     }
     // }

     // $(document).ready(function() {
     //     $("#multiStepForm").validate(); // Enable validation
     // });
 </script>
</body>

</html>