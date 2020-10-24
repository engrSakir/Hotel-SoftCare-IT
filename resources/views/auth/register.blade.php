@extends('auth.layouts.app')
@push('title') Register  @endpush
@push('header')   @endpush
@section('content')
    <div class="card card-primary card-authentication1 mx-auto my-5 animated bounceInDown">
        <div class="card-body">
            <div class="card-content p-2">
                <div class="card-title text-uppercase text-center pb-2">Customer - Sign Up</div>
                <hr>
                @include('includes.message')
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-rounded" placeholder="Name" value="{{ old('name') }}">
                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="phone" class="sr-only">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control form-control-rounded" placeholder="Phone Number" value="{{ old('phone') }}">
                            <div class="form-control-position">
                                <i class="icon-envelope-open"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="password" class="sr-only">Password</label>
                            <input type="text" id="password" name="password" class="form-control form-control-rounded" placeholder="Password" value="{{ old('password') }}">
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="password_confirmation" class="sr-only">Retry Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-rounded" placeholder="Retry Password">
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block waves-effect waves-light">Sign Up</button>
                    <div class="text-center pt-3">
                        <p class="text-muted">Already have an account? <a href="{{ route('login') }}"> Sign In here</a></p>
                        <hr>
                        <p class="text-muted">New hotel registration? <a href="{{ route('hotelRegistration') }}"> Hotel Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@push('footer')  @endpush









