@extends('layout.multistepbas')
@section('title', 'Display Templates')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar with scroll -->
        <div class="col-md-3">
            <div class="p-3 border bg-light" style="height: 100vh; overflow-y: auto;">
                <h5 class="mb-3">Other Templates</h5>
                @foreach ($otherTemplate as $item)
                    <div class="mb-2">
                        <a href="{{ url('showTemplate/' . $item->id) }}" 
                           class="badge text-bg-warning w-100 p-2 d-block text-start">
                            {{ $item->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Main template preview -->
        <div class="col-md-9">
            <div class="p-3">
                <h4 class="mb-3">{{ $template->name }}</h4>
                @php
                    // dd($template);
                @endphp
                {{-- Here is where your template preview loads --}}
                @if(view()->exists('templates.' .$template->name))
                    @include('templates.' . $template->name, [
                        'getUser' => $getUser,
                        'getEduction' => $getEduction,
                        'getExperience' => $getExperience
                    ])
                @else
                    <p class="text-danger">Template view not found.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
