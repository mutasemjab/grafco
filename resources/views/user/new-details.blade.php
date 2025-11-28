@extends('layouts.app')
@section('title', ($locale === 'ar' ? $news->name_ar : $news->name_en) . ' | graphco')

@section('content')
<section class="news-detail-page">
    <div class="container">
        <!-- Breadcrumb -->
        <nav class="news-breadcrumb">
            <a href="{{ route('home') }}">{{ __('front.home') }}</a>
            <span>/</span>
            <a href="{{ route('news') }}">{{ __('front.news') }}</a>
            <span>/</span>
            <span>{{ $locale === 'ar' ? $news->name_ar : $news->name_en }}</span>
        </nav>

        <!-- News Header -->
        <div class="news-detail-header">
            <h1 class="news-detail-title">{{ $locale === 'ar' ? $news->name_ar : $news->name_en }}</h1>
            <div class="news-detail-meta">
                <span class="news-detail-date">
                    <svg width="16" height="16" viewBox="0 0 24 24">
                        <path d="M8 2v3m8-3v3M3 9h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z" stroke="#01AD5E" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    {{ \Carbon\Carbon::parse($news->date_of_news)->format('F d, Y') }}
                </span>
            </div>
        </div>

        <!-- Featured Image -->
        <div class="about-media">
            <img src="{{ asset('assets/admin/uploads/' . $news->photo) }}" alt="{{ $locale === 'ar' ? $news->name_ar : $news->name_en }}">
        </div>

        <!-- News Content -->
        <div class="about-text">
                {!! $locale === 'ar' ? $news->description_ar : $news->description_en !!}
        </div>


        <!-- Related News -->
        @if($relatedNews->count() > 0)
        <div class="news-detail-related">
            <h2 class="related-title">{{ __('front.related_news') }}</h2>
            <div class="related-news-grid">
                @foreach($relatedNews as $related)
                <article class="related-news-item">
                    <a href="{{ route('new.details', $related->id) }}" class="related-news-link">
                        <div class="related-news-image">
                            <img src="{{ asset('assets/admin/uploads/' . $related->photo) }}" alt="{{ $locale === 'ar' ? $related->name_ar : $related->name_en }}">
                        </div>
                        <div class="related-news-content">
                            <span class="related-news-date">{{ \Carbon\Carbon::parse($related->date_of_news)->format('M d, Y') }}</span>
                            <h3 class="related-news-title">{{ $locale === 'ar' ? $related->name_ar : $related->name_en }}</h3>
                        </div>
                    </a>
                </article>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>

<style>
.news-detail-page {
    padding: 60px 0;
    background: #f8f9fa;
}

.news-breadcrumb {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 30px;
    font-size: 14px;
    color: #6c757d;
}

.news-breadcrumb a {
    color: #01AD5E;
    text-decoration: none;
    transition: color 0.3s;
}

.news-breadcrumb a:hover {
    color: #018a4a;
}

.news-detail-header {
    margin-bottom: 30px;
}

.news-detail-title {
    font-size: 42px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 20px;
    line-height: 1.2;
}

.news-detail-meta {
    display: flex;
    align-items: center;
    gap: 20px;
}

.news-detail-date {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #6c757d;
    font-size: 15px;
}

.news-detail-related {
    margin-bottom: 50px;
}

.related-title {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 30px;
    color: #1a1a1a;
}

.related-news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 25px;
}

.related-news-item {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: transform 0.3s, box-shadow 0.3s;
}

.related-news-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.related-news-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.related-news-image {
    height: 200px;
    overflow: hidden;
}

.related-news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.related-news-item:hover .related-news-image img {
    transform: scale(1.05);
}

.related-news-content {
    padding: 20px;
}

.related-news-date {
    display: block;
    font-size: 13px;
    color: #01AD5E;
    margin-bottom: 10px;
}

.related-news-title {
    font-size: 16px;
    font-weight: 600;
    color: #1a1a1a;
    line-height: 1.4;
}

.news-detail-back {
    text-align: center;
}

.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 30px;
    background: #01AD5E;
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: background 0.3s;
}

.btn-back:hover {
    background: #018a4a;
}

@media (max-width: 768px) {
    .news-detail-title {
        font-size: 28px;
    }
    
    .news-detail-body {
        padding: 25px;
    }
    
    .related-news-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection