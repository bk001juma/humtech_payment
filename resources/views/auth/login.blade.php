@extends('layouts.intime')

@section('template_title')
	Login
@endsection

@section('meta')
	<meta name="googlebot" content="noindex, nofollow">
@endsection

@section('content')
    <!-- Page Header Start -->
	<div class="page-header bg-section parallaxie">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-3" data-cursor="-opaque">Login</h1>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Contact Us Start -->
    <div class="page-contact-us">
        <div class="contact-info-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="service-featured-image">
                            <figure class="image-anime reveal" style="transform: translate(0px); opacity: 1; visibility: inherit;">
                                <img src="/img/login.jpg" alt="" style="transform: translate(0px);">
                            </figure>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-5">
                        <!-- Contact Form Start -->
                        <div class="contact-us-form">
                            <form id="logForm" action="{{ route('login') }}" method="POST" class="wow fadeInUp" data-wow-delay="0.5s">
                                <div class="row">
                                    @csrf
                                    <div class="form-group col-md-6 mb-4 ">
                                        <label>email</label>
                                        <input type="email" value="{{old('email')}}" name="email" class="form-control" id="email" placeholder="Enter Your Email" required>
                                            @if ($errors->has('email'))
                                                <strong style="color: red">{{ $errors->first('email') }}</strong>
                                            @endif
                                        <div class="help-block with-errors">
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Number" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="col-lg-12 mb-5">
                                        <div class="contact-form-btn">
                                            <button form="logForm" type="submit" class="btn-default">Login</button>
{{--                                            <div id="msgSubmit" class="h3 hidden"></div>--}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="wow fadeInUp" data-wow-delay="0.9s">Dont have an Account? <a href="{{route('register')}}">Register Here</a></p>
                        </div>
                        <!-- Contact Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

@endsection
