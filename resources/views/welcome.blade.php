@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Enjoy with Atur Kopi') }}</h1>
                            <button class="btn btn-dark" >
                            <a class="nav-link nav-link-icon " href="{{ route('login') }}">
                                <span class="nav-link-inner--text">{{ __('Login') }}</span>
                            </a>
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
