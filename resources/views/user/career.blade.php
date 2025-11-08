@extends('layouts.app')
@section('title', __('front.title') . ' | graphco')

@section('content')
<section class="career-page">
    <div class="container">
        <h1 class="career-title">{{ __('front.title') }}</h1>
        <div class="career-title-line"></div>

        @if($career)
        <div class="career-intro">
            <div class="career-intro-line"></div>
            <h2 class="career-intro-heading">{{ $career->name }}</h2>
            <div class="career-intro-line"></div>
        </div>

        <p class="career-intro-text">
            {{ $career->description }}
        </p>
        @endif

        <div class="career-positions-head">
            <div class="career-pos-line"></div>
            <div class="career-pos-title">{{ __('front.available_positions') }}</div>
            <div class="career-pos-line"></div>
        </div>

        <div class="career-positions">
            @foreach($positions as $position)
            <div class="career-position">
                <div class="career-icon">
                    @if($position->photo)
                        <img src="{{ asset('assets/admin/uploads/' . $position->photo) }}" alt="{{ $position->name }}" width="40" height="40">
                    @else
                        <!-- Default SVG icon -->
                        <svg width="40" height="40" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" fill="#01AD5E" opacity=".12"/>
                            <path d="M12 6a3 3 0 0 1 3 3c0 1.3-.4 2.1-.9 2.6l-.5.5V14h-2.2v-2.3l-.5-.5C10.4 11.1 10 10.3 10 9a3 3 0 0 1 3-3Z" fill="#01AD5E"/>
                            <path d="M8.5 17.5c.4-1.5 1.9-2.5 3.5-2.5s3.1 1 3.5 2.5" stroke="#01AD5E" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                    @endif
                </div>
                <button class="career-pill">{{ $position->name }}</button>
            </div>
            @endforeach
        </div>

        <div class="career-apply-wrap">
            <button class="career-apply-btn">{{ __('front.apply_online') }}</button>
        </div>

        @if($career)
        <div class="career-footer">
            <h2 class="career-footer-title">{{ $career->bottom_name }}</h2>
            <p class="career-footer-text">
                {!! $career->bottom_description !!}
            </p>
        </div>
        @endif
    </div>
</section>
@endsection