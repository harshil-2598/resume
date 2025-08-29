<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olivia Schumacher - Marketing Manager</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.5;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
        }

        .header {
            margin-bottom: 30px;
        }

        h1 {
            color: #000;
            margin-bottom: 5px;
            font-size: 32px;
            font-weight: 700;
        }

        h2 {
            color: #000;
            margin-top: 30px;
            margin-bottom: 15px;
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
        }

        h3 {
            color: #000;
            margin-bottom: 5px;
            font-size: 18px;
            font-weight: 700;
        }

        .position {
            font-size: 20px;
            color: #555;
            margin-bottom: 15px;
        }

        .contact-info {
            margin-bottom: 20px;
            color: #555;
        }

        .company {
            font-weight: 700;
            margin-top: 15px;
        }

        .date {
            color: #555;
            font-style: italic;
            margin-bottom: 5px;
        }

        .job-description {
            margin-bottom: 20px;
        }

        .divider {
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }

        .skills-section {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .skills-column {
            width: 50%;
            margin-bottom: 15px;
        }

        .skills-list {
            list-style-type: none;
            padding-left: 0;
        }

        .skills-list li {
            margin-bottom: 8px;
        }

        .languages-references {
            display: flex;
            margin-top: 20px;
        }

        .languages,
        .references {
            width: 50%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 5px 0;
            vertical-align: top;
        }

        @media (max-width: 600px) {

            .skills-column,
            .languages,
            .references {
                width: 100%;
            }

            .languages-references {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>{{ isset($getUser->name) ? $getUser->name : 'MARSELINA' . '<br>' . 'ZALIYANTI' }}</h1>
        <div class="position">{{ isset($getUser->name) ? $getUser->profession : 'Accountant' }}</div>
        <div class="contact-info">
            {{ isset($getUser->contact_no) ? $getUser->contact_no : '+123-456-7890' }} •
            {{ isset($getUser->email) ? $getUser->email : '+123-456-7890' }} • @redityonstein<br>
            1224eyelmont, city City, 51 12556,
            {{ isset($getUser->website) ? $getUser->website : 'www.reallygreatsite.com' }}
        </div>
        <div class="divider"></div>
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
                <div class="date">{{ $start_date .'-'. $end_date }}</div>
                <h3>{{ $exp->job_title }}</h3>
                <div class="job-description">
                    {!! $exp->job_description !!}
                </div>
            @endforeach
        @endif


        {{-- <div class="date">2020 - 2023</div>

        <div class="job-description">
            Loren: [brand] olivia.schumacher.com/products/customer.gait, buyer at and store nice<br>
            and brand in the market, market at quality.org/Licida<br>
            existically: neque, tied for ref, temper as benodent, a softbudd in area.
        </div>

        <div class="divider"></div>

        <div class="company">Lenin & Co.</div>
        <div class="date">2019 - 2020</div>
        <h3>Marketing Manager</h3>
        <div class="job-description">
            Loren: [brand] olivia.schumacher.com/products/customer.gait, buyer at and store nice<br>
            and brand in the market, market at quality.org/Licida<br>
            existically: neque, tied for ref, temper as benodent, a softbudd in area.
        </div>

        <div class="divider"></div>

        <div class="company">Lenin & Co.</div>
        <div class="date">2017 - 2019</div>
        <h3>Marketing Manager</h3>
        <div class="job-description">
            Loren: [brand] olivia.schumacher.com/products/customer.gait, buyer at and store nice<br>
            and brand in the market, market at quality.org/Licida<br>
            existically: neque, tied for ref, temper as benodent, a softbudd in area.
        </div> --}}
    </div>

    <div class="section">
        <h2>EDUCATION</h2>

        @foreach ($getEduction as $edu)
            @php
                $passing_year = \Carbon\Carbon::parse($exp->passing_year)->format('d-m-Y');
            @endphp
            <div class="company">{{ $edu->school_name }}</div>
            <div class="date">{{ $passing_year }}</div>
            <h3>{{ $edu->study_field }}</h3>
            <div class="divider"></div>
        @endforeach
    </div>

    <div class="section">
        <h2>SKILLS</h2>
        @php
            $skills = json_decode($getUser->skill);
        @endphp

        <div class="skills-section">
            @foreach ($skills as $sk)
                <div class="skills-column">
                    <h3>{{$sk}}</h3>
                </div>
            @endforeach
        </div>

        <div class="languages-references">
            <div class="languages">
                <h3>LANGUAGE</h3>
                <table>
                    <tr>
                        <td>English</td>
                    </tr>
                    <tr>
                        <td>French</td>
                    </tr>
                    <tr>
                        <td>Spanish</td>
                    </tr>
                </table>
            </div>

            <div class="references">
                <h3>REFERENCES</h3>
                <table>
                    <tr>
                        <td>Hayumi Kobayashi</td>
                    </tr>
                    <tr>
                        <td>Antoine Nir / CEO</td>
                    </tr>
                    <tr>
                        <td>France 12 au 1996</td>
                        <td>Exact</td>
                        <td>Informatique assistance</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
