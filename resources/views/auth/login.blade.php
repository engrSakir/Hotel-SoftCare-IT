@extends('auth.layouts.app')
@push('title') Login  @endpush
@push('header')   @endpush
@section('content')
    <div class="card card-primary card-authentication1 mx-auto my-5 animated bounceInDown">
        <div class="card-body">
            <div class="card-content p-2">
                <div class="card-title text-uppercase text-center pb-2">Sign In</div>
                @include('includes.message')
                <form action="{{ route('login') }}" method="post" class="login100-form validate-form">
                    @csrf
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="exampleInputUsername" class="sr-only">Phone number</label>
                            <input type="number" id="phone" name="phone" class="form-control form-control-rounded" placeholder="013 xxx xxx">
                            <div class="form-control-position">
                                <i class="icon-phone"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="exampleInputPassword" class="sr-only">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-rounded" placeholder="Password">
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mr-0 ml-0">
                        <div class="form-group col-6">
                            <div class="demo-checkbox">
                                <input type="checkbox" id="user-checkbox" class="filled-in chk-col-primary" checked="" />
                                <label for="user-checkbox">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group col-6 text-right">
                            <a href="#">Reset Password</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block waves-effect waves-light"><b>Sign In Now</b></button>
                    <div class="text-center pt-3">
                        <p class="text-muted">Do not have an account? <a href="{{ route('register') }}"> Sign Up here</a></p>
                        <hr>
                        <p class="text-muted">New hotel registration? <a href="{{ route('hotelRegistration') }}"> Hotel Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('footer')  @endpush
