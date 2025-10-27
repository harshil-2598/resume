@extends('layout.multistepbas')
@section('title', 'Choose Template')
<link rel="icon" type="image/png" sizes="56x56" href="{{ asset('assets/images/fav-icon/icon.png') }}">
<!-- bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" media="all">
<!-- carousel CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css" media="all">
<!-- animate CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" type="text/css" media="all">
<!-- animated-text CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/animated-text.css') }}" type="text/css" media="all">
<!-- font-awesome CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" type="text/css" media="all">
<!-- theme-default CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/theme-default.css') }}" type="text/css" media="all">
<!-- meanmenu CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}" type="text/css" media="all">
<!-- transitions CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}" type="text/css" media="all">
<!-- venobox CSS -->
<link rel="stylesheet" href="{{ asset('assets/venobox/venobox.css') }}" type="text/css" media="all">
<!-- flaticon -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}" type="text/css" media="all">
<!-- bootstrap icons -->
<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}" type="text/css" media="all">
<!-- Main Style CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" media="all">
<!-- responsive CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" type="text/css" media="all">
<!-- Coustom Animation CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/coustom-animation.css') }}" type="text/css" media="all">
<!-- odometer CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/odometer-theme-default.css') }}" type="text/css" media="all">

<link rel="stylesheet" href="{{ asset('assets/css/scroll-up.css') }}" type="text/css" media="all">

@section('style')
    <style>
        .btn-transparent {
            background-color: transparent !important;
            border: 1px solid #007bff !important;
            color: #007bff !important;
            transition: all 0.3s ease;
        }

        .btn-transparent:hover {
            background-color: #1ec28e !important;
            color: #fff !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 dark">
            <div class="container">
                <div class="progress-section mt-5">
                    <a href="">Choose Template</a>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="container">

                <section class="feature-area style-one">
                    <div class="container">
                        <div class="row align-items-center section-title-space">
                            <div class="col-lg-6">
                                <div class="section-sub-title">
                                    <h6>core features</h6>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section_title">
                                    <h1>Interactive Online Learning</h1>
                                    <h1>Key Features & Benefits</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($getTepmpate as $key => $item)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mt-2">
                                    <div class="single-feature-box box-1">
                                        <div class="feature-icon">
                                            <img src="assets/images/home-one/feature-icon1.png" alt="feature-icon">
                                            <img src="..." class="card-img-top" alt="...">
                                        </div>
                                        <div class="feature-content">
                                            <h4 class="feature-title">{{ $item['name'] }}</h4>
                                            <p class="feature-desc">Template - {{ $key + 1 }}</p>
                                        </div>
                                        <div class="educate-hover-box hover-bx"></div>
                                        <div class="educate-hover-box hover-bx2"></div>
                                        <div class="educate-hover-box hover-bx3"></div>
                                        <div class="educate-hover-box hover-bx4"></div>

                                        <a href="{{ route('showTemplate', $item['id']) }}" class="btn btn-transparent">Go
                                            Template</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="feature-shape1">
                            <img src="{{ asset('assets/images/home-one/feature-shape1.png') }}" alt="shape">
                        </div>
                        <div class="feature-shape2 rotateme">
                            <img src="{{ asset('assets/images/home-one/feature-shape2.png') }}" alt="shape2">
                        </div>
                    </div>
                </section>

                <div class="row ">
                    @foreach ($getTepmpate as $item)
                        <div class="col-md-3">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item['name'] }}</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of
                                        the card’s content.</p>
                                    <a href="{{ route('showTemplate', $item['id']) }}" class="btn btn-primary">Go
                                        Template</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>




@endsection


@section('script')
    <script src="{{ asset('assets/js/vendor/jquery-3.6.2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- JavaScript for image preview -->
    <script>
        document.getElementById('profile_image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const defaultImage = "{{ asset('images/default-profile.png') }}";

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = defaultImage;
            }
        });
    </script>
@endsection
