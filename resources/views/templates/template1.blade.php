<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Resume</title>
    <style>
        .main-content {
            margin-left: var(--sidebar-width);
            /* margin: 0 auto; */
            padding: 2rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .resume {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
        }

        .left-column {
            flex: 1;
            padding: 30px;
            background: #2c3e50;
            color: white;
        }

        .right-column {
            flex: 2;
            padding: 30px;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            margin-bottom: 20px;
        }

        h1 {
            margin: 0 0 10px;
            font-size: 28px;
        }

        h2 {
            font-size: 20px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
            margin-top: 20px;
        }

        .contact-info {
            margin: 15px 0;
        }

        .contact-info p {
            margin: 5px 0;
            display: flex;
            align-items: center;
        }

        .contact-info i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .skills {
            margin: 15px 0;
        }

        .skill-item {
            margin-bottom: 10px;
        }

        .skill-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .skill-bar {
            height: 5px;
            background: #34495e;
            border-radius: 3px;
        }

        .skill-level {
            height: 100%;
            background: #3498db;
            border-radius: 3px;
        }

        .experience,
        .education {
            margin-bottom: 20px;
        }

        .job,
        .degree {
            margin-bottom: 15px;
        }

        .job-title,
        .degree-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .company,
        .university {
            font-style: italic;
            color: #3498db;
        }

        .date {
            color: #7f8c8d;
            font-size: 14px;
        }

        .description {
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="resume">
        <!-- Left Column (Personal Info & Skills) -->
        <div class="left-column">
            <!-- Optional: Add or remove image -->

            @if ($getUser)
                <img src="{{ asset($getUser->profile_pic) }}" alt="{{ $getUser->name }}" class="profile-img">
            @else
                <img src="profile.jpg" alt="Profile Photo" class="profile-img">
            @endif
            <h1>{{ $getUser->name ?? 'Your Name' }}</h1>
            <p>{{ $getUser->profession ?? 'Your Profession' }}</p>

            <div class="contact-info">
                <h2>Contact</h2>
                @if ($getUser)
                    <p><i>📱</i>{{ $getUser->contact_no ?? 'Phone Number' }}</p>
                    <p><i>✉️</i> {{ $getUser->email ?? 'Email Address' }}</p>
                    <p><i>🏠</i> {{ $getUser->city ?? 'City' }}, {{ $getUser->country ?? 'Country' }}</p>
                    <p><i>🔗</i> {{ $getUser->linked_in ?? 'LinkedIn Profile' }}</p>
                    <p><i>💻</i> {{ $getUser->website ?? 'Personal Website' }}</p>
                @else
                    <p><i>📱</i>Phone Number</p>
                    <p><i>✉️</i>Email Address</p>
                    <p><i>🏠</i>City, Country</p>
                    <p><i>🔗</i>LinkedIn Profile</p>
                    <p><i>💻</i>Personal Website</p>
                @endif
            </div>

            <div class="skills">
                <h2>Skills</h2>
                <div class="skill-item">
                    <div class="skill-name">HTML/CSS</div>
                    <div class="skill-bar">
                        <div class="skill-level" style="width: 90%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">JavaScript</div>
                    <div class="skill-bar">
                        <div class="skill-level" style="width: 80%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">React</div>
                    <div class="skill-bar">
                        <div class="skill-level" style="width: 75%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">Node.js</div>
                    <div class="skill-bar">
                        <div class="skill-level" style="width: 70%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column (Work Experience & Education) -->
        <div class="right-column">
            <h2>Professional Summary</h2>
            <p>Experienced web developer with 5+ years of expertise in front-end and back-end development. Passionate
                about creating responsive and user-friendly web applications.</p>

            <h2>Work Experience</h2>
            <div class="experience">
                @foreach ($getExperience as $exp)
                    <div class="job">
                        <div class="job-title">{{ $exp->job_title }}</div>
                        <div class="company">{{ $exp->employer }}</div>
                        <div class="date">
                            {{ $exp->start_date . ' - ' . $exp->end_date }}
                        </div>
                        <div class="description">
                            <ul>
                                <li>Developed and maintained company website using React and Node.js</li>
                                <li>Led a team of 3 junior developers</li>
                                <li>Improved website performance by 40%</li>
                            </ul>
                        </div>
                    </div>

                    {{-- <div class="job">
                    <div class="job-title">Web Developer</div>
                    <div class="company">Digital Creations</div>
                    <div class="date">Jun 2017 - Dec 2019</div>
                    <div class="description">
                        <ul>
                            <li>Built responsive websites for clients</li>
                            <li>Implemented RESTful APIs</li>
                            <li>Collaborated with designers to create UI/UX</li>
                        </ul>
                    </div>
                </div> --}}
                @endforeach
            </div>

            <h2>Education</h2>
            <div class="education">
                @foreach ($getEduction as $edu)
                    <div class="degree">
                        <div class="degree-name">{{ $edu->degree }}</div>
                        <div class="university">{{ $edu->school_name }}</div>
                        <div class="date">
                            {{ \Carbon\Carbon::parse($edu->passing_year)->format('d-m-Y') }}</div>
                    </div>

                    {{-- <div class="degree">
                        <div class="degree-name">Bachelor of Information Technology</div>
                        <div class="university">City College</div>
                        <div class="date">2011 - 2015</div>
                    </div> --}}
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
