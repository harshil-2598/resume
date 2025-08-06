<!DOCTYPE html>
<html>

<head>
    <title>Laravel Livewire Wizard Form Example - ItSolutionStuff.com</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <style>
        body {
            margin-top: 40px;
        }

        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

        .displayNone {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="card mt-5">
            <h3 class="card-header p-3">Laravel 11 Livewire Wizard Form Example - ItSolutionStuff.com</h3>
            <div class="card-body">
                <livewire:wizard />
                
            </div>
        </div>

    </div>

</body>

@livewireScripts

</html>
