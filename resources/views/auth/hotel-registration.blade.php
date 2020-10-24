@extends('auth.layouts.app')
@push('title') Hotel Register  @endpush
@push('header')   @endpush
@section('content')
    <div class="card card-primary card-authentication1 mx-auto my-5 animated bounceInDown">
        <div class="card-body">
            <div class="card-content p-2">
                <div class="card-title text-uppercase text-center pb-2">Hotel - Sign Up</div>
                <hr>
                @include('includes.message')
                <form method="POST" action="{{ route('submitHotelRegistration') }}">
                    @csrf
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="name" class="sr-only">Hotel</label>
                            <input type="text" id="hotel_name" name="hotel_name" class="form-control form-control-rounded" placeholder="Hotel name" value="{{ old('hotel_name') }}">
                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="name" class="sr-only">Location</label>
                            <select class="form-control" id="hotel_location" name="hotel_location">
                                <option disabled selected> Chose location </option>
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" id="name" name="owner_name" class="form-control form-control-rounded" placeholder="Name" value="{{ old('owner_name') }}">
                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <label for="phone" class="sr-only">Phone Number</label>
                            <input type="text" id="owner_mobile" name="owner_mobile" class="form-control form-control-rounded" placeholder="Phone Number" value="{{ old('owner_mobile') }}">
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
                        <p class="text-muted">Customer registration? <a href="{{ route('register') }}"> Customer Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@push('footer')  @endpush









