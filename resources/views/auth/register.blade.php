@extends('auth.layout')

@section('content')

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center justify-content-center text-center"
                            style="text-decoration: none;">
                            <img src="{{ asset('backend/asset') }}/img/logo.png" alt="" style="margin-right: 10px;">
                            <span style="font-weight: bold; font-size: 24px; color: #333;">NiceAdmin</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2 text-center">
                                <h5 style="margin-bottom: 5px;">Create an Account</h5>
                                <p style="font-size: 14px;">Enter your personal details to create an account</p>
                            </div>

                            <form class="needs-validation" novalidate
                                style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: space-between;"
                                method="POST" action="{{ route('register') }}">
                                @csrf

                                <div style="width: 48%;">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div style="width: 48%;">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div style="width: 48%;">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div style="width: 48%;">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div style="width: 100%; display: flex; align-items: center;">
                                    <input type="checkbox" name="terms" required>
                                    <label for="acceptTerms" style="margin-left: 5px;">I agree to the <a href="#">terms and
                                            conditions</a></label>
                                </div>

                                <div style="width: 100%;">
                                    <button type="submit"
                                        style="width: 100%; padding: 10px; background-color: blue; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                        {{ __('Register') }}
                                    </button>
                                </div>

                            </form>

                            <p class="small text-center" style="margin-top: 10px;">Already have an account? <a
                                    href="{{ route('login') }}">Log in</a></p>

                        </div>
                    </div>

                    <div class="credits">
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>

                </div>
            </div>
        </div>

    </section>

@endsection