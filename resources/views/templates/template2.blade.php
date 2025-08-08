<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resume Template</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f5f5f5;
        padding: 20px;
        display: flex;
        justify-content: center;
    }
    .resume {
        background: #fff;
        max-width: 800px;
        width: 100%;
        padding: 40px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        border-bottom: 2px solid #eee;
        padding-bottom: 20px;
    }
    .header h1 {
        font-size: 28px;
        margin: 0;
        font-weight: bold;
    }
    .header h2 {
        font-size: 18px;
        margin: 5px 0 0;
        font-weight: normal;
        color: gray;
    }
    .contact {
        font-size: 14px;
        line-height: 1.6;
    }
    .contact p {
        margin: 0;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .section {
        margin-top: 30px;
    }
    .section-title {
        background: #f0f0f0;
        padding: 8px 12px;
        font-weight: bold;
        font-size: 16px;
        text-transform: uppercase;
    }
    .job, .edu {
        margin-top: 15px;
    }
    .job h3, .edu h3 {
        margin: 0;
        font-size: 15px;
        font-weight: bold;
    }
    .job span, .edu span {
        font-size: 13px;
        color: gray;
    }
    .job p, .edu p {
        margin: 5px 0 0;
        font-size: 13px;
        color: #333;
    }
    .skills {
        display: flex;
        gap: 50px;
    }
    .skills ul {
        padding: 0;
        margin: 5px 0 0;
        list-style: none;
    }
    .skills li {
        font-size: 13px;
        margin-bottom: 4px;
    }
</style>
</head>
<body>
    <div class="resume">
        <div class="header">
            <div>
                <h1>MARSELINA<br>ZALIYANTI</h1>
                <h2>Accountant</h2>
            </div>
            <div class="contact">
                <p>📞 +123-456-7890</p>
                <p>✉️ hello@reallygreatsite.com</p>
                <p>📍 123 Anywhere St., Any City</p>
                <p>🌐 www.reallygreatsite.com</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Work Experience</div>
            <div class="job">
                <h3>Senior Accountant</h3>
                <span>Inqoude Company | 2019 – Present</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            </div>
            <div class="job">
                <h3>Accountant</h3>
                <span>Inqoude Company | 2015 – 2019</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            </div>
            <div class="job">
                <h3>Junior Accountant</h3>
                <span>Inqoude Company | 2012 – 2015</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Education</div>
            <div class="edu">
                <h3>Master of Business Administration Accounting</h3>
                <span>Rembetu University | 2010 – 2014</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            </div>
            <div class="edu">
                <h3>Bachelor of Arts Accounting</h3>
                <span>Bonalie University | 2008 – 2011</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Skill</div>
            <div class="skills">
                <div>
                    <strong>Personal</strong>
                    <ul>
                        <li>Management Skills</li>
                        <li>Time Management</li>
                        <li>Negotiation</li>
                        <li>Critical Thinking</li>
                        <li>Leadership Skills</li>
                    </ul>
                </div>
                <div>
                    <strong>Professional</strong>
                    <ul>
                        <li>Nonprofit Accounting</li>
                        <li>Payroll Accounting</li>
                        <li>Financial Analysis</li>
                        <li>Tax Accounting</li>
                        <li>Accounts Payable/Receivable</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
