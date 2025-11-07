<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Templates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-bg: #f8f9fa;
            --dark-text: #212529;
            --sidebar-width: 280px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fb;
            color: var(--dark-text);
            overflow-x: hidden;
        }
        
        /* Fixed sidebar styling */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            overflow-y: auto;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-content {
            padding: 1rem;
        }
        
        .template-link {
            display: block;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .template-link:hover, .template-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-left: 3px solid var(--accent-color);
            transform: translateX(5px);
        }
        
        /* Main content area */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .template-title {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .download-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(67, 97, 238, 0.2);
        }
        
        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(67, 97, 238, 0.3);
        }
        
        /* Template preview container */
        .template-preview-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            overflow: auto;
        }
        
        .template-preview {
            width: 100%;
            max-width: 800px;
            min-height: 500px;
            background-color: white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            border-radius: 8px;
            padding: 2rem;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .sidebar {
                width: 250px;
            }
            
            .main-content {
                margin-left: 250px;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: block;
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 1100;
                background-color: var(--primary-color);
                color: white;
                border: none;
                border-radius: 4px;
                padding: 0.5rem 0.75rem;
            }
        }
        
        /* Scrollbar styling */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }
        
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
        
        /* Loading animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
            margin-right: 10px;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Mobile menu toggle button (hidden on larger screens) -->
    <button class="menu-toggle d-lg-none">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Fixed sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Resume Templates</h4>
            <p class="mb-0 text-light">Choose a template</p>
        </div>
        <div class="sidebar-content">
            <h6 class="mb-3">Other Templates</h6>
            @foreach ($otherTemplate as $item)
                <div class="mb-2">
                    <a href="{{ url('showTemplate/' . $item->id) }}" 
                       class="template-link {{ $template->id == $item->id ? 'active' : '' }}">
                        {{ $item->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Main content area -->
    <div class="main-content">
        <div class="content-header">
            <h2 class="template-title">{{ $template->name }}</h2>
            <button class="btn btn-primary download-btn" onclick="downloadPDF()">
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                Download PDF
            </button>
        </div>
        
        <div class="template-preview-container">
            <div class="template-preview" id="downloadTemplate">
                @if (view()->exists('templates.' . $template->name))
                    @include('templates.' . $template->name, [
                        'getUser' => $getUser,
                        'getEduction' => $getEduction,
                        'getExperience' => $getExperience,
                    ])
                @else
                    <p class="text-danger">Template view not found.</p>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>
    <script>
        // Download PDF function
        function downloadPDF() {
            const element = document.getElementById('downloadTemplate');
            const button = document.querySelector('.download-btn');
            const spinner = button.querySelector('.spinner-border');
            const originalText = button.innerHTML;
            
            // Show loading state
            button.disabled = true;
            spinner.classList.remove('d-none');
            button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Generating PDF...';
            
            // Generate PDF
            html2pdf()
                .from(element)
                .set({
                    margin: 10,
                    filename: 'resume.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                })
                .save()
                .then(() => {
                    // Restore button state
                    button.disabled = false;
                    spinner.classList.add('d-none');
                    button.innerHTML = originalText;
                });
        }
        
        // Mobile menu toggle
        document.querySelector('.menu-toggle')?.addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
        
        // Auto-close mobile sidebar when clicking on a link
        document.querySelectorAll('.template-link').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 768) {
                    document.querySelector('.sidebar').classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>