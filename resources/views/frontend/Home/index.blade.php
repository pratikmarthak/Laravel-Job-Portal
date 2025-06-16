@extends('frontend.layouts.master')

@section('contents')

    <div class="bg-homepage1"></div>
    <!-- Hero Section Start -->
    @include('frontend.home.sections.hero-section')
    <!-- Hero Section End -->
    <div class="mt-100"></div>

    <!-- Categories Section Start -->
    @include('frontend.home.sections.categoires-section')
    <!-- Categories Section End -->

    <!-- Featured Job Section Start -->
    {{-- @include('frontend.home.sections.featured-job-section') --}}
    <!-- Featured Job Section End -->

    <!-- Why Chooes Us Job Section Start -->
    {{-- @include('frontend.home.sections.why-chooes-us-section') --}}
    <!-- Why Chooes Us Job Section End -->

    <!-- Learn More Section Start -->
    {{-- @include('frontend.home.sections.learn-more-section') --}}
    <!-- Learn More Section End -->

    <!-- Counter Section Start -->
    {{-- @include('frontend.home.sections.counter-section') --}}
    <!-- Counter Section End -->

    <!-- Top Recuiters Section Start -->
    {{-- @include('frontend.home.sections.top-recuiters-section') --}}
    <!-- Top Recuiters Section End -->

    <!-- Pricing Plan Section Start -->
    @include('frontend.home.sections.pricing-plan-section')
    <!-- Pricing Plan Section End -->

    <!-- Job BY Location Section Start -->
    {{-- @include('frontend.home.sections.job-by-location-section') --}}
    <!-- Job BY Location Section End -->

    <!-- Review Section Start -->
    {{-- @include('frontend.home.sections.review-section') --}}
    <!-- Review Section End -->

    <!-- Blog Section Start -->
    {{-- @include('frontend.home.sections.blog-section') --}}
    <!-- Blog Section End -->

@endsection
