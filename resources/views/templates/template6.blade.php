<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wahana Prima - Graphic Designer Resume</title>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #1abc9c;
            --text-dark: #333;
            --text-light: #777;
            --light-bg: #f5f7fa;
            --dark-bg: #0b3d5e;
            --border-color: #e0e0e0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: var(--light-bg);
            display: flex;
            justify-content: center;
            padding: 30px;
            line-height: 1.6;
            color: var(--text-dark);
        }

        .resume-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            background: white;
            max-width: 900px;
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Left Side */
        .left-side {
            background: var(--dark-bg);
            color: white;
            padding: 40px 25px;
        }

        .profile-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto 20px;
            border: 4px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .section-title {
            font-weight: 600;
            font-size: 1.2rem;
            margin: 30px 0 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
            letter-spacing: 0.5px;
        }

        .contact-info p,
        .education-item,
        .skills-list li {
            margin: 12px 0;
            display: flex;
            align-items: center;
            font-size: 0.95rem;
        }

        .contact-info i,
        .education-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            color: var(--accent-color);
        }

        .education-item {
            margin-bottom: 20px;
        }

        .education-degree {
            font-weight: 600;
            margin-bottom: 3px;
        }

        .education-school {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .education-date {
            font-size: 0.85rem;
            font-style: italic;
            opacity: 0.8;
        }

        .skills-list {
            list-style: none;
        }

        .skills-list li {
            position: relative;
            padding-left: 25px;
            margin-bottom: 10px;
        }

        .skills-list li:before {
            content: "▹";
            position: absolute;
            left: 0;
            color: var(--accent-color);
        }

        /* Right Side */
        .right-side {
            padding: 40px;
        }

        .name {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .title {
            font-size: 1.2rem;
            color: var(--secondary-color);
            margin-bottom: 30px;
            font-weight: 500;
        }

        .right-side .section-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--border-color);
        }

        .about p {
            font-size: 0.95rem;
            color: var(--text-dark);
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .job {
            margin-bottom: 25px;
        }

        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 8px;
        }

        .job-title {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--primary-color);
        }

        .job-company {
            font-weight: 500;
            color: var(--secondary-color);
        }

        .job-date {
            font-size: 0.9rem;
            color: var(--text-light);
            background: var(--light-bg);
            padding: 3px 8px;
            border-radius: 4px;
        }

        .job-description {
            font-size: 0.95rem;
            color: var(--text-dark);
            margin-top: 10px;
        }

        .job-tasks {
            margin-top: 10px;
            padding-left: 20px;
        }

        .job-tasks li {
            margin-bottom: 8px;
            position: relative;
            padding-left: 15px;
        }

        .job-tasks li:before {
            content: "•";
            color: var(--accent-color);
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .resume-container {
                grid-template-columns: 1fr;
            }

            .left-side,
            .right-side {
                padding: 30px;
            }

            .profile-pic {
                width: 120px;
                height: 120px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .left-side,
            .right-side {
                padding: 25px;
            }

            .name {
                font-size: 1.8rem;
            }

            .title {
                font-size: 1.1rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <div class="resume-container">
        <!-- Left Side -->
        <div class="left-side">
            <div class="profile-section">
                @if ($getUser)
                    <img src="{{ asset($getUser->profile_pic) }}" alt="{{ $getUser->name }}" class="profile-pic">
                @else
                    <div class="profile-pic-placeholder">
                        <i class="fas fa-user" style="font-size: 60px; color: #ccc;"></i>
                    </div>
                @endif
            </div>

            <div class="contact-info">
                <div class="section-title">CONTACT</div>
                <p><i class="fas fa-phone"></i> {{ $getUser->contact_no ?? '+123-456-7890' }}</p>
                <p><i class="fas fa-envelope"></i> {{ $getUser->email ?? 'hello@reallygreatsite.com' }}</p>
                <p><i class="fas fa-map-marker-alt"></i> {{ $getUser->address ?? '123 Anywhere St, Any City' }}</p>
                <p><i class="fas fa-globe"></i> {{ $getUser->website ?? 'yourwebsite.com' }}</p>
            </div>

            <div class="education">
                <div class="section-title">EDUCATION</div>

                @if(isset($getEducation) && count($getEducation) > 0)
                    @foreach ($getEducation as $edu)
                        @php
                            $passing_year = \Carbon\Carbon::parse($edu->passing_year)->format('M Y');
                        @endphp

                        <div class="education-item">
                            <i class="fas fa-graduation-cap"></i>
                            <div>
                                <div class="education-degree">{{ $edu->degree }}</div>
                                <div class="education-school">{{ $edu->school_name }}</div>
                                <div class="education-date">{{ $passing_year }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="education-item">
                        <i class="fas fa-graduation-cap"></i>
                        <div>
                            <div class="education-degree">Bachelor of Design</div>
                            <div class="education-school">Art and Design University</div>
                            <div class="education-date">2018 - 2022</div>
                        </div>
                    </div>
                @endif
            </div>
            
            <div class="skills">
                <div class="section-title">SKILLS</div>
                <ul class="skills-list">
                    @if(isset($getUser->skill) && !empty($getUser->skill))
                        @php
                            $skills = json_decode($getUser->skill);
                        @endphp
                        @foreach ($skills as $sk)
                            <li>{{ $sk }}</li>
                        @endforeach
                    @else
                        <li>Adobe Creative Suite</li>
                        <li>UI/UX Design</li>
                        <li>Typography</li>
                        <li>Brand Identity</li>
                        <li>Print Design</li>
                        <li>Web Design</li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Right Side -->
        <div class="right-side">
            <h1 class="name">{{ $getUser->name ?? 'Your Name' }}</h1>
            <div class="title">{{ $getUser->profession ?? 'Graphic Designer' }}</div>

            <div class="about">
                <div class="section-title">ABOUT ME</div>
                <p>{{ $getUser->objective ?? 'Creative and detail-oriented graphic designer with 5+ years of experience specializing in brand identity, print design, and digital marketing materials. Passionate about creating visually compelling designs that communicate client messages effectively and drive engagement.' }}
                </p>
            </div>

            <div class="work-exp">
                <div class="section-title">WORK EXPERIENCE</div>

                @if(isset($getExperience) && count($getExperience) > 0)
                    @foreach ($getExperience as $exp)
                        @php
                            $start_date = \Carbon\Carbon::parse($exp->start_date)->format('M Y');
                            $end_date = \Carbon\Carbon::parse($exp->end_date)->format('M Y');
                        @endphp

                        <div class="job">
                            <div class="job-header">
                                <div>
                                    <span class="job-title">{{ $exp->job_title }}</span> •
                                    <span class="job-company">{{ $exp->employer }}</span>
                                </div>
                                <span class="job-date">{{ $start_date . ' - ' . $end_date }}</span>
                            </div>
                            <div class="job-description">
                                {!! $exp->job_description !!}
                            </div>
                        </div>
                    @endforeach
                @endif
                    {{-- <div class="job">
                        <div class="job-header">
                            <div>
                                <span class="job-title">Senior Graphic Designer</span> •
                                <span class="job-company">Creative Studio Inc.</span>
                            </div>
                            <span class="job-date">Jan 2020 - Present</span>
                        </div>
                        <div class="job-description">
                            Lead designer for brand identity projects and marketing campaigns.
                        </div>
                        <ul class="job-tasks">
                            <li>Developed brand identities for 20+ clients across various industries</li>
                            <li>Created marketing materials that increased client engagement by 35%</li>
                            <li>Mentored junior designers and established design best practices</li>
                        </ul>
                    </div>
                    
                    <div class="job">
                        <div class="job-header">
                            <div>
                                <span class="job-title">Graphic Designer</span> •
                                <span class="job-company">Digital Marketing Agency</span>
                            </div>
                            <span class="job-date">Jun 2017 - Dec 2019</span>
                        </div>
                        <div class="job-description">
                            Created visual content for digital marketing campaigns and social media.
                        </div>
                        <ul class="job-tasks">
                            <li>Designed social media graphics that increased follower engagement by 40%</li>
                            <li>Produced email marketing templates with 25% higher click-through rates</li>
                            <li>Collaborated with copywriters to create cohesive brand messages</li>
                        </ul>
                    </div> --}}
                
            </div>
        </div>
    </div>

</body>

</html>