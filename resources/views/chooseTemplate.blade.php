@extends('layout.multistepbas')
@section('title', 'Choose Template')

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
                <div class="row">
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
