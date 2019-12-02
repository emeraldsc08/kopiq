@extends('layouts.app', ['class' => 'bg-default'])



    <div>
    <body>
    @section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('argon') }}/img/img-01.png" class="navbar-brand-img" alt="...">
				</div>

				<form class="login100-form validate-form" role="form" method="POST" action="{{ route('login') }}">
                @csrf
					<span class="login100-form-title">
						Sign In
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">



                        <input class="input100" type="email" name="email" placeholder="{{ __('Email') }}"
                                name="email" value="{{ old('email') }}" value="admin@argon.com" required autofocus >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">



                        <input class="input100" type="password" name="password" placeholder="{{ __('Password') }}"
                        type="password" value="secret" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-136">

					</div>
				</form>
			</div>
		</div>
	</div>

</body>
    </div>
@endsection
