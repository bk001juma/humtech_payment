@extends('layouts.intime')

@section('template_title')
	@yield('title')
@endsection

@section('content')
    <!-- error section start -->
    <div class="error-page pt-0">
        <div class="container">
            <div class="row">
                <div class="error-page-image wow fadeInUp" data-wow-delay="0.25s">
                    <img src="/images/404-error-img.png" alt="">
                </div>
                <div class="error-page-content">
                    <div class="error-page-content-heading">
                        <h2 class="text-anime-style-3" data-cursor="-opaque"><span>Oops!</span> Page Not Found</h2>
                    </div>
                    <div class="error-page-content-body">
                        <p class="wow fadeInUp" data-wow-delay="0.5s">The page you are looking for does not exist</p>
                        <a class="btn-default wow fadeInUp" data-wow-delay="0.75s" href="/">Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- error section end -->
@endsection
