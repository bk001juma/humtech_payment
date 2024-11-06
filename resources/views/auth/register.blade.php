@extends('layouts.intime')

@section('template_title')
	Supplier Registration
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
                                <img src="/img/register.jpg" alt="" style="transform: translate(0px);">
                            </figure>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Contact Form Start -->
                        <div class="contact-us-form">
                            <form id="regForm" action="{{ route('register') }}" method="POST"  class="wow fadeInUp mb-5" data-wow-delay="0.5s">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <label>first name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" id="first_name" placeholder="Enter Your Name" required>
                                        <div class="help-block with-errors"></div>
                                        @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <label>last name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" id="last_name" placeholder="Enter Your Name" required>
                                        <div class="help-block with-errors"></div>
                                        @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <label>email</label>
                                        <input type="email" name ="email" class="form-control" id="email" placeholder="Enter Your Email" required>
                                        <div class="help-block with-errors"></div>
                                        @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Number" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <label>Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Your Number" required>
                                        <div class="help-block with-errors"></div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="contact-form-btn">
                                            <button form="regForm" type="submit" class="btn-default">Register</button>
{{--                                            <div id="msgSubmit" class="h3 hidden"></div>--}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="wow fadeInUp" data-wow-delay="0.9s">Have an Account? <a href="{{route('login')}}">Login Here</a></p>
                        </div>
                        <!-- Contact Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

@endsection
