<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marselina Zaliyanti - Accountant</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 5px;
            font-size: 28px;
        }

        h2 {
            color: #3498db;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
            margin-top: 25px;
            font-size: 22px;
        }

        h3 {
            color: #2c3e50;
            margin-bottom: 5px;
            font-size: 18px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .position {
            font-size: 20px;
            color: #7f8c8d;
            font-weight: normal;
        }

        .company {
            font-weight: bold;
            margin-top: 10px;
        }

        .date {
            color: #7f8c8d;
            font-style: italic;
        }

        .section {
            margin-bottom: 30px;
        }

        .divider {
            border-top: 1px solid #ecf0f1;
            margin: 20px 0;
        }

        .skills-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .skills-column {
            width: 48%;
        }

        .skills-list {
            list-style-type: none;
            padding-left: 0;
        }

        .skills-list li {
            margin-bottom: 8px;
            position: relative;
            padding-left: 20px;
        }

        .skills-list li:before {
            content: "•";
            color: #3498db;
            position: absolute;
            left: 0;
        }

        @media (max-width: 600px) {
            .skills-container {
                flex-direction: column;
            }

            .skills-column {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>{{ isset($getUser->name) ? $getUser->name : 'MARSELINA' . '<br>' . 'ZALIYANTI' }}</h1>
        <div class="position">{{ isset($getUser->name) ? $getUser->profession : 'Accountant' }}</div>
    </div>

    <div class="section">
        <h2>WORK EXPERIENCE</h2>
        @if ($getExperience)
            @foreach ($getExperience as $exp)
                @php
                    $start_date = \Carbon\Carbon::parse($exp->start_date)->format('M Y');
                    $end_date = \Carbon\Carbon::parse($exp->end_date)->format('M Y');
                @endphp
                <div class="company">{{ $exp->employer }}</div>
                <div class="job">

                    <div class="date">{{ $exp->employer . '|' . $start_date . '-' . $end_date }}</div>
                    <div class="divider"></div>
                    <h3>{{ $exp->job_title }}</h3>
                    <p>{!! $exp->job_description !!}</p>
                </div>
            @endforeach
        @endif

        {{-- <div class="company">Popular Company</div>
        <div class="date">2019 - Present</div>

        <div class="divider"></div>

        <h3>Accountant</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat.</p> --}}
    </div>

    <div class="section">

        <h2>EDUCATION</h2>

        @foreach ($getEduction as $edu)
            @php
                $passing_year = \Carbon\Carbon::parse($exp->passing_year)->format('d-m-Y');
            @endphp

            <div class="company">{{ $edu->school_name }}</div>
            <div class="date">{{ $edu->school_name }} | {{ $passing_year }}</div>
            <h3>{{ $edu->study_field }}</h3>
            <div class="edu">
                <h3>{{ $edu->degree }}</h3>
                <span>{{ $edu->school_name }} | {{ $passing_year }}</span>
                <p></p>
            </div>
        @endforeach


        {{-- <div class="divider"></div>

        <div class="company">Brooklin University</div>
        <div class="date">2006-2011</div> --}}
    </div>

    <div class="section">
        <h2>SKILLS</h2>
        @php
            $skills = json_decode($getUser->skill);
        @endphp
        <div class="skills-container">
            @foreach ($skills as $sk)
            <div class="skills-column">
                <h3>Personal</h3>
                <ul class="skills-list">
                    <li>{{ $sk }}</li>
                </ul>
            </div>
            @endforeach
            {{-- <div class="skills-column">
                <h3>Professional</h3>
                <ul class="skills-list">
                    <li>Financial Accounting</li>
                    <li>Management Accounting</li>
                    <li>Financial Reporting</li>
                    <li>Auditing</li>
                    <li>Express Reporting</li>
                    <li>Accounting Professional</li>
                    <li>Account Statements</li>
                </ul>
            </div> --}}
        </div>
    </div>
</body>

</html>
