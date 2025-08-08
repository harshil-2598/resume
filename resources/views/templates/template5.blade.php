<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Professional Resume</title>
<style>
    :root {
        --primary-color: #2a5d89;
        --secondary-color: #f8f9fa;
        --accent-color: #e9ecef;
        --text-dark: #333;
        --text-light: #6c757d;
    }
    
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        background-color: #f1f3f5;
        color: var(--text-dark);
        padding: 20px;
    }
    
    .resume {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        border-radius: 8px;
        display: flex;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    /* Left Column */
    .left {
        background-color: var(--primary-color);
        color: white;
        width: 35%;
        padding: 30px;
        position: relative;
    }
    
    .profile-pic {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 25px;
        border: 4px solid rgba(255,255,255,0.2);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    
    .profile-pic img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .name {
        text-align: center;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 5px;
        letter-spacing: 0.5px;
    }
    
    .title {
        text-align: center;
        font-size: 16px;
        font-weight: 400;
        margin-bottom: 30px;
        opacity: 0.9;
    }
    
    .section-title {
        font-size: 18px;
        font-weight: 600;
        margin: 25px 0 15px;
        padding-bottom: 8px;
        border-bottom: 2px solid rgba(255,255,255,0.2);
        letter-spacing: 1px;
    }
    
    .contact-info p, .about, .skills li {
        margin: 12px 0;
        display: flex;
        align-items: center;
        font-size: 14px;
    }
    
    .contact-info i, .skills i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }
    
    .about {
        font-size: 14px;
        line-height: 1.7;
        opacity: 0.9;
    }
    
    .skills ul {
        list-style: none;
    }
    
    .skills li {
        margin-bottom: 10px;
        position: relative;
        padding-left: 25px;
    }
    
    .skills li:before {
        content: "▹";
        position: absolute;
        left: 0;
        color: white;
    }
    
    /* Right Column */
    .right {
        width: 65%;
        padding: 35px;
    }
    
    .section {
        margin-bottom: 30px;
    }
    
    .section h2 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 2px solid var(--accent-color);
        color: var(--primary-color);
        letter-spacing: 0.5px;
    }
    
    .item {
        margin-bottom: 20px;
    }
    
    .item h3 {
        font-size: 17px;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--text-dark);
    }
    
    .item span {
        display: block;
        font-size: 14px;
        color: var(--text-light);
        margin-bottom: 8px;
        font-style: italic;
    }
    
    .item p {
        font-size: 14px;
        color: var(--text-dark);
        line-height: 1.7;
    }
    
    .reference {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .reference div {
        flex: 1 1 200px;
        background: var(--secondary-color);
        padding: 15px;
        border-radius: 5px;
        font-size: 14px;
    }
    
    .reference strong {
        display: block;
        margin-bottom: 5px;
        color: var(--primary-color);
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .resume {
            flex-direction: column;
        }
        
        .left, .right {
            width: 100%;
        }
        
        .left {
            padding: 25px;
        }
        
        .profile-pic {
            width: 120px;
            height: 120px;
        }
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<div class="resume">
    <div class="left">
        <div class="profile-pic">
            <img src="https://via.placeholder.com/150" alt="Profile Picture">
        </div>
        <div class="name">Lorna Alvarado</div>
        <div class="title">Marketing Manager</div>

        <div class="section-title">CONTACT</div>
        <div class="contact-info">
            <p><i class="fas fa-phone"></i> +123-456-7890</p>
            <p><i class="fas fa-envelope"></i> hello@reallygreatsite.com</p>
            <p><i class="fas fa-map-marker-alt"></i> 123 Anywhere St., Any City</p>
            <p><i class="fas fa-globe"></i> yourwebsite.com</p>
            <p><i class="fab fa-linkedin"></i> linkedin.com/yourprofile</p>
        </div>

        <div class="section-title">ABOUT ME</div>
        <div class="about">
            Results-driven marketing professional with 5+ years of experience in developing and implementing strategic marketing campaigns. Passionate about brand development and digital marketing strategies that drive engagement and revenue growth.
        </div>

        <div class="section-title">SKILLS</div>
        <div class="skills">
            <ul>
                <li>Strategic Marketing Planning</li>
                <li>Brand Development</li>
                <li>Digital Marketing</li>
                <li>Social Media Management</li>
                <li>Market Research</li>
                <li>Team Leadership</li>
                <li>Data Analysis</li>
                <li>Content Creation</li>
            </ul>
        </div>
    </div>

    <div class="right">
        <div class="section">
            <h2><i class="fas fa-graduation-cap"></i> EDUCATION</h2>
            <div class="item">
                <h3>Master of Business Administration</h3>
                <span>London University | 2020 - 2023</span>
                <p>Specialized in Marketing and Digital Strategy. Completed thesis on "The Impact of Social Media Algorithms on Brand Visibility."</p>
            </div>
            <div class="item">
                <h3>Bachelor of Business Management</h3>
                <span>Brooke University | 2016 - 2020</span>
                <p>Major in Marketing, Minor in Communications. Graduated with honors (GPA: 3.8/4.0).</p>
            </div>
        </div>

        <div class="section">
            <h2><i class="fas fa-briefcase"></i> EXPERIENCE</h2>
            <div class="item">
                <h3>Product Design Manager</h3>
                <span>Arroun Industries | 2020 - Present</span>
                <p>Lead a team of 10 designers in developing innovative product solutions. Increased customer satisfaction by 35% through improved UX design processes.</p>
            </div>
            <div class="item">
                <h3>Marketing Manager</h3>
                <span>Lorenzo Marketing | 2019 - 2020</span>
                <p>Developed and executed digital marketing campaigns that increased lead generation by 42%. Managed $500k annual marketing budget.</p>
            </div>
            <div class="item">
                <h3>Marketing Specialist</h3>
                <span>Arroun Industries | 2017 - 2019</span>
                <p>Implemented social media strategy that grew followers by 150% in 18 months. Coordinated successful product launch campaigns.</p>
            </div>
        </div>

        <div class="section">
            <h2><i class="fas fa-star"></i> REFERENCES</h2>
            <div class="reference">
                <div>
                    <strong>Harumi Kobayashi</strong>
                    Wardwire Inc. / CEO<br>
                    <i class="fas fa-phone"></i> 123-456-7890<br>
                    <i class="fas fa-envelope"></i> h.kobayashi@wardwire.com
                </div>
                <div>
                    <strong>Bailey Dupont</strong>
                    Lorenzo Marketing / Director<br>
                    <i class="fas fa-phone"></i> 987-654-3210<br>
                    <i class="fas fa-envelope"></i> b.dupont@lorenzo.com
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>