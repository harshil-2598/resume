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
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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
        border: 4px solid rgba(255,255,255,0.2);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .section-title {
        font-weight: 600;
        font-size: 1.2rem;
        margin: 30px 0 15px;
        padding-bottom: 8px;
        border-bottom: 2px solid rgba(255,255,255,0.2);
        letter-spacing: 0.5px;
    }

    .contact-info p, .education-item, .skills-list li {
        margin: 12px 0;
        display: flex;
        align-items: center;
        font-size: 0.95rem;
    }

    .contact-info i, .education-item i {
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
        
        .left-side, .right-side {
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
        
        .left-side, .right-side {
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
            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-pic">
        </div>

        <div class="contact-info">
            <div class="section-title">CONTACT</div>
            <p><i class="fas fa-phone"></i> +123-456-7890</p>
            <p><i class="fas fa-envelope"></i> hello@example.com</p>
            <p><i class="fas fa-map-marker-alt"></i> 123 Anywhere St, Any City</p>
            <p><i class="fas fa-globe"></i> yourportfolio.com</p>
        </div>

        <div class="education">
            <div class="section-title">EDUCATION</div>
            <div class="education-item">
                <i class="fas fa-graduation-cap"></i>
                <div>
                    <div class="education-degree">Secondary School</div>
                    <div class="education-school">Really Great High School</div>
                    <div class="education-date">2010 - 2014</div>
                </div>
            </div>
            <div class="education-item">
                <i class="fas fa-university"></i>
                <div>
                    <div class="education-degree">Bachelor of Technology</div>
                    <div class="education-school">Really Great University</div>
                    <div class="education-date">2014 - 2016</div>
                </div>
            </div>
        </div>

        <div class="skills">
            <div class="section-title">SKILLS</div>
            <ul class="skills-list">
                <li>Active Listening</li>
                <li>Adaptability</li>
                <li>Critical Thinking</li>
                <li>Empathy</li>
                <li>Problem Solving</li>
                <li>Computer Literacy</li>
                <li>Strong Communication</li>
            </ul>
        </div>
    </div>

    <!-- Right Side -->
    <div class="right-side">
        <h1 class="name">Wahana Prima</h1>
        <div class="title">Specialist Graphic Designer</div>

        <div class="about">
            <div class="section-title">ABOUT ME</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc a ultrices tortor. In vestibulum vitae velit nec varius. Punt non ultrices ex. Integer mettie dol vel pretium eiusmod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc a ultrices tortus. In veridikacin vitae velit esse viverra.</p>
        </div>

        <div class="work-exp">
            <div class="section-title">WORK EXPERIENCE</div>

            <div class="job">
                <div class="job-header">
                    <div>
                        <span class="job-title">Applications Developer</span> • 
                        <span class="job-company">Really Great Company</span>
                    </div>
                    <span class="job-date">2016 - Present</span>
                </div>
                <div class="job-description">
                    Developed and maintained web applications with a focus on user experience and performance.
                </div>
                <ul class="job-tasks">
                    <li>Database administration and website design</li>
                    <li>Built the logo for a streamlined e-learning platform</li>
                    <li>Educational institutions and online classroom management</li>
                    <li>Implemented responsive design principles</li>
                </ul>
            </div>

            <div class="job">
                <div class="job-header">
                    <div>
                        <span class="job-title">Web Content Manager</span> • 
                        <span class="job-company">Really Great Company</span>
                    </div>
                    <span class="job-date">2014 - 2016</span>
                </div>
                <div class="job-description">
                    Managed all web content and ensured brand consistency across digital platforms.
                </div>
                <ul class="job-tasks">
                    <li>Content creation and strategy development</li>
                    <li>SEO optimization and analytics</li>
                    <li>Social media integration</li>
                    <li>Team leadership and coordination</li>
                </ul>
            </div>

            <div class="job">
                <div class="job-header">
                    <div>
                        <span class="job-title">Analysis Content</span> • 
                        <span class="job-company">Really Great Company</span>
                    </div>
                    <span class="job-date">2010 - 2014</span>
                </div>
                <div class="job-description">
                    Conducted market research and content analysis to drive business decisions.
                </div>
                <ul class="job-tasks">
                    <li>Data collection and interpretation</li>
                    <li>Competitor analysis</li>
                    <li>Report generation and presentation</li>
                    <li>Trend forecasting</li>
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>