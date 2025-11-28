@extends('layouts.app')
@section('title', __('front.news') . ' | graphco')

@section('content')
@php
    // Get unique years from news
    $newsYears = $news->pluck('date_of_news')
                     ->map(function($date) {
                         return \Carbon\Carbon::parse($date)->year;
                     })
                     ->unique()
                     ->sort()
                     ->values();
@endphp

<section class="news-page">
    <div class="container">
        <h1 class="news-title-main">{{ __('front.graphco_news') }}</h1>
        <div class="news-title-line"></div>

        <div class="news-toprow">
            <div class="news-tabs" data-news-tabs>
                <button class="news-tab is-active" data-year="all">{{ __('front.all') }}</button>
                @foreach($newsYears as $year)
                    <button class="news-tab" data-year="{{ $year }}">{{ $year }}</button>
                @endforeach
            </div>
            <div class="news-search">
                <span class="news-search-ico">
                    <svg width="18" height="18" viewBox="0 0 24 24">
                        <path d="M21 21l-3.9-3.9M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" stroke="#8a8f96" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <input type="text" placeholder="{{ __('front.search') }}" data-news-search>
            </div>
        </div>

        <div class="news-list" data-news-list>
            @foreach($news as $index => $item)
                @php
                    $year = \Carbon\Carbon::parse($item->date_of_news)->year;
                    $formattedDate = \Carbon\Carbon::parse($item->date_of_news)->format('M d, Y');
                @endphp
                                    <a href="{{route('new.details',$item->id)}}" style=" color: inherit; text-decoration: none;">

                <article class="news-item" data-year="{{ $year }}" data-index="{{ $index }}">
                    <div class="news-item-image">
                        <img src="{{ asset('assets/admin/uploads/' . $item->photo) }}" alt="{{ $locale === 'ar' ? $item->name_ar : $item->name_en }}">
                    </div>
                    <div class="news-item-body">
                        <div class="news-item-head">
                            <h2 class="news-item-title">{{ $locale === 'ar' ? $item->name_ar : $item->name_en }}</h2>
                            <span class="news-item-date">{{ $formattedDate }}</span>
                        </div>
                        <p class="news-item-text">
                            {!! Str::limit($locale === 'ar' ? $item->description_ar : $item->description_en, 150) !!}
                        </p>
                    </div>
                     
                </article>
               </a>
            @endforeach
        </div>

        @if($news->count() > 6)
        <div class="news-more-wrap">
            <button class="news-more-btn" type="button" data-news-more>{{ __('front.load_more') }}</button>
        </div>
        @endif
    </div>
</section>
@endsection
