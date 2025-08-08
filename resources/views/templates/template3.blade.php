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
        <h1>MARSELINA ZALIYANTI</h1>
        <div class="position">Accountant</div>
    </div>

    <div class="section">
        <h2>WORK EXPERIENCE</h2>
        
        <div class="company">Popular Company</div>
        <div class="date">2019 - Present</div>
        
        <div class="divider"></div>
        
        <h3>Senior Accountant</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        
        <div class="company">Popular Company</div>
        <div class="date">2019 - Present</div>
        
        <div class="divider"></div>
        
        <h3>Accountant</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <div class="section">
        <h2>EDUCATION</h2>
        
        <div class="company">Brothers University</div>
        <div class="date">2010-2021</div>
        
        <div class="divider"></div>
        
        <h3>Status of Business Administration Accounting</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        
        <div class="company">Brooklin University</div>
        <div class="date">2006-2011</div>
    </div>

    <div class="section">
        <h2>SKILLS</h2>
        
        <div class="skills-container">
            <div class="skills-column">
                <h3>Personal</h3>
                <ul class="skills-list">
                    <li>Teamwork Skills</li>
                    <li>Time Management</li>
                    <li>Negotiation</li>
                    <li>Critical Thinking</li>
                    <li>Communication Skills</li>
                    <li>Leadership</li>
                </ul>
            </div>
            
            <div class="skills-column">
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
            </div>
        </div>
    </div>
</body>
</html>