@extends('layouts.app')

<title>Register</title>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header" align="center">{{ __('Sign Up') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                    {{csrf_field()}}
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12 m-auto">
                                <input id="name" placeholder="Full Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 m-auto">
                                <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 m-auto">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 m-auto">
                                <input id="password-conf" placeholder="Confirm Password" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 m-auto">
                                <input id="phone-number" placeholder="Phone Number" type="tel" class="form-control @error('phone-number') is-invalid @enderror" value="{{ old('phone-number') }}" name="phone-number" autocomplete="phone-number">
                                @error('phone-number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 m-auto">
                                <input id="address" placeholder="Address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 m-auto">
                                <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" autocomplete="gender">
                                    <option value="" disabled selected>Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 m-auto">
                                Profile Picture<br><input id="profile-pic" type="file" class="form-control-file @error('profile-pic') is-invalid @enderror" name="profile-pic" autocomplete="profile-pic">
                                @error('profile-pic')
                                <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 offset-md-4 m-auto">
                                <div class="form-check">
                                    <input class="form-check-input @error('terms_and_conditions') is-invalid @enderror" type="checkbox" name="terms_and_conditions" id="agree">
                                    <label class="form-check-label" for="remember">{{ __('I Agree with Terms and Condition') }}</label>
                                    @error('terms_and_conditions')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 m-auto">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Sign Up') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
