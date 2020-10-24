@extends('backend.layouts.app')
@push('title') Frontend Manage @endpush
@push('header')  @endpush
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">{{ $setting->name }} </h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Frontend Manage</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            @can('manage-frontend')
                <div class="row">
                    <div class="col-lg-12">
                        <div id="accordion6">
                            <div class="card mb-2 bg-success">
                                <div class="card-header bg-transparent">
                                    <button class="btn btn-link shadow-none text-white" data-toggle="collapse" data-target="#collapse-system-setting" aria-expanded="true" aria-controls="collapse-16">
                                        <b>More system setting</b>
                                    </button>
                                </div>
                                <div id="collapse-system-setting" class="collapse" data-parent="#accordion6">
                                    <div class="card-body text-white">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form>
                                                            <h4 class="form-header text-uppercase">
                                                                <i class="fa fa-user-circle-o"></i>
                                                                Website Info
                                                            </h4>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="website-name">Name</label>
                                                                    <input type="text" class="form-control" id="website-name" value="{{ $setting->name }}">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="website-slogan">Slogan</label>
                                                                    <input type="text" class="form-control" id="website-slogan" value="{{ $setting->slogan }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="website-address">Address</label>
                                                                    <input type="text" class="form-control" id="website-address" value="{{ $setting->address }}">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="website-email">Email</label>
                                                                    <input type="email" class="form-control" id="website-email" value="{{ $setting->email }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="website-phone">Phone</label>
                                                                    <input type="text" class="form-control" id="website-phone" value="{{ $setting->phone }}">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="website-logo">Logo</label>
                                                                    <input type="file" accept="image/*" class="form-control" id="website-logo" value="{{ $setting->logo }}">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="website-fav">Fav</label>
                                                                    <input type="file" accept="image/*" class="form-control" id="website-fav" value="{{ $setting->fav }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="website-footer-left">Footer left note</label>
                                                                <textarea class="form-control" rows="4" id="website-footer-left"> {{ $setting->footer_left }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="website-subscribe-note">Subscribe note</label>
                                                                <textarea class="form-control" rows="4" id="website-subscribe-note"> {{ $setting->subscribe_note }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="website-contact-note">Contact note</label>
                                                                <textarea class="form-control" rows="4" id="website-contact-note"> {{ $setting->contact_note }}</textarea>
                                                            </div>
                                                            <div class="form-footer">
                                                                <button type="button" class="btn btn-success shadow-success m-1" id="system-information-submit-btn"><i class="fa fa-check-square-o"></i> Submit Now</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="profile-card-2">
                            <div class="card profile-success">
                                <div class="card-body text-center">
                                    <div class="user-box">
                                        <img src="{{ asset('uploads/images/'.$setting->logo) }}" alt="user avatar">
                                    </div>
                                    <h5 class="mb-1"><b>{{ $setting->name }}</b></h5>
                                    <h6 class="text-muted">{{ $setting->address }}</h6>
                                    <div class="row">
                                        <div class="col border-light border-right p-2">
                                            <h6 class="mb-0">{{ '100' }}</h6>
                                            <p class="mb-0">Booking</p>
                                        </div>
                                        <div class="col p-2">
                                            <h6 class="mb-0">{{ '1000' }}</h6>
                                            <p class="mb-0">Visitors</p>
                                        </div>
                                    </div>
                                    <div class="list-inline mt-2">
                                        <a href="javascript:void()" class="list-inline-item btn-social btn-facebook waves-effect waves-light"><i class="fa fa-facebook"></i></a>
                                        <a href="javascript:void()" class="list-inline-item btn-social btn-google-plus waves-effect waves-light"><i class="fa fa-google-plus"></i></a>
                                        <a href="javascript:void()" class="list-inline-item btn-social btn-twitter waves-effect waves-light"><i class="fa fa-twitter"></i></a>
                                    </div>
                                    <hr>
                                    <a href="javascript:void():" class="list-inline-item btn btn-success btn-block waves-effect waves-light">Website</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header text-uppercase">Website banner image</div>
                            <div class="card-body">
                                <div id="carousel-3" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($banners as $image)
                                            <div class="carousel-item @if($loop->iteration == 1) active @endif ">
                                                <img class="d-block w-100" height="400" src="{{ asset('uploads/images/'.$image->image) }}" alt="First slide">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($banners as $image)
                                        <div class="col-lg-3">
                                            <div class="card card-danger">
                                                <img height="50" src="{{ asset('uploads/images/'.$image->image) }}" class="card-img-top edit-image-previewer">
                                                <div class="card-body">
                                                    <input style="display: none" type="file" accept="image/*" class="editable-image-file">
                                                    <input type="hidden" class="image-id" value="{{ \Illuminate\Support\Facades\Crypt::encryptString($image->id) }}">
                                                    <button type="button" class="btn btn-outline-warning waves-effect waves-light m-1 edit-image-btn" id="" value="*websiteSlider"> <i class="fa fa-edit"></i> </button>
                                                    <button type="button" class="btn btn-outline-danger waves-effect waves-light m-1 delete-image-btn" id=""> <i class="fa fa-trash-o"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-lg-3">
                                        <div class="card card-danger">
                                            <div class="card-body">
                                                <img src="" id="banner-image-previewer" class="card-img-top">
                                                <input style="display: none" type="file" accept="image/*" id="banner-image-importer" class="image-file">
                                                <button type="button" class="btn btn-outline-success waves-effect waves-light m-1" id="add-banner-image-btn"> <i class="fa fa-plus"></i> </button>
                                                <button type="button" class="btn btn-outline-success waves-effect waves-light m-1 image-submit" id="upload-banner-image-btn" value="+websiteSlider"> <i class="zmdi zmdi-check-circle"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @can(['manage-frontend'])
                    <script>
                        $(document).ready(function() {
                            //Add banner
                            $("#add-banner-image-btn").click(function (){
                                $('#banner-image-importer').click();
                            })
                            //Preview banner
                            $("#banner-image-importer").change(function (event){
                                if(event.target.files.length > 0) {
                                    var src = URL.createObjectURL(event.target.files[0]);
                                    var preview = document.getElementById("banner-image-previewer");
                                    preview.src = src;
                                    preview.style.display = "block";
                                }
                            })
                            //Submit all images for new add
                            $('.image-submit').click(function(){
                                var formData = new FormData();
                                formData.append('purpose', $(this).val())
                                formData.append('image', $(this).parent().find('.image-file')[0].files[0])
                                $.ajax({
                                    method: 'POST',
                                    url: "{{ route('backend.frontend.update') }}",
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function (data) {
                                        Swal.fire({
                                            position: 'top-end',
                                            icon: data.type,
                                            title: data.message,
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        setTimeout(function() {
                                            //your code to be executed after 1 second
                                            location.reload();
                                        }, 1000); //1 second
                                    },
                                    error: function (xhr) {
                                        var errorMessage = '<div class="card bg-danger">\n' +
                                            '                        <div class="card-body text-center p-5">\n' +
                                            '                            <span class="text-white">';
                                        $.each(xhr.responseJSON.errors, function(key,value) {
                                            errorMessage +=(''+value+'<br>');
                                        });
                                        errorMessage +='</span>\n' +
                                            '                        </div>\n' +
                                            '                    </div>';
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            footer: errorMessage
                                        })
                                    },
                                })
                            });


                            //Edit images select and submit
                            $(".edit-image-btn").click(function (){
                                $(this).parent().find('.editable-image-file').click();
                                $(this).parent().find('.editable-image-file').change( function (){
                                    var formData = new FormData();
                                    formData.append('purpose', $(this).parent().find('.edit-image-btn').val())
                                    formData.append('selected_image', $(this).parent().find('.image-id').val())
                                    formData.append('image',$(this).parent().find('.editable-image-file')[0].files[0])
                                    $.ajax({
                                        method: 'POST',
                                        url: "{{ route('backend.frontend.update') }}",
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function (data) {
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: data.type,
                                                title: data.message,
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                            setTimeout(function() {
                                                //your code to be executed after 1 second
                                                location.reload();
                                            }, 1000); //1 second
                                        },
                                        error: function (xhr) {
                                            var errorMessage = '<div class="card bg-danger">\n' +
                                                '                        <div class="card-body text-center p-5">\n' +
                                                '                            <span class="text-white">';
                                            $.each(xhr.responseJSON.errors, function(key,value) {
                                                errorMessage +=(''+value+'<br>');
                                            });
                                            errorMessage +='</span>\n' +
                                                '                        </div>\n' +
                                                '                    </div>';
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                footer: errorMessage
                                            })
                                        },
                                    })
                                });
                            })

                            //Delete images select and submit
                            $(".delete-image-btn").click(function (){
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: "You won't be able to revert this!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        var formData = new FormData();
                                        formData.append('purpose', 'delete-image')
                                        formData.append('selected_image', $(this).parent().find('.image-id').val())
                                        $.ajax({
                                            method: 'POST',
                                            url: "{{ route('backend.frontend.update') }}",
                                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                            data: formData,
                                            processData: false,
                                            contentType: false,
                                            success: function (data) {
                                                Swal.fire({
                                                    position: 'top-end',
                                                    icon: data.type,
                                                    title: data.message,
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                })
                                                setTimeout(function() {
                                                    //your code to be executed after 1 second
                                                    location.reload();
                                                }, 1000); //1 second
                                            },
                                            error: function (xhr) {
                                                var errorMessage = '<div class="card bg-danger">\n' +
                                                    '                        <div class="card-body text-center p-5">\n' +
                                                    '                            <span class="text-white">';
                                                $.each(xhr.responseJSON.errors, function(key,value) {
                                                    errorMessage +=(''+value+'<br>');
                                                });
                                                errorMessage +='</span>\n' +
                                                    '                        </div>\n' +
                                                    '                    </div>';
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    footer: errorMessage
                                                })
                                            },
                                        })
                                    }
                                })
                            });

                            //Update system setting
                            $("#system-information-submit-btn").click(function (){
                                    var formData = new FormData();
                                    formData.append('name', $('#website-name').val())
                                    formData.append('slogan', $('#website-slogan').val())
                                    formData.append('address', $('#website-address').val())
                                    formData.append('email', $('#website-email').val())
                                    formData.append('phone', $('#website-phone').val())
                                    formData.append('logo',$('#website-logo')[0].files[0])
                                    formData.append('fav_icon',$('#website-fav')[0].files[0])
                                    formData.append('contact_note', $('#website-contact-note').val())
                                    formData.append('subscribe_note', $('#website-subscribe-note').val())
                                    formData.append('footer_left', $('#website-footer-left').val())
                                    formData.append('purpose', 'system-information')
                                    $.ajax({
                                        method: 'POST',
                                        url: "{{ route('backend.frontend.update') }}",
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function (data) {
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: data.type,
                                                title: data.message,
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                            setTimeout(function() {
                                                //your code to be executed after 1 second
                                                location.reload();
                                            }, 1000); //1 second
                                        },
                                        error: function (xhr) {
                                            var errorMessage = '<div class="card bg-danger">\n' +
                                                '                        <div class="card-body text-center p-5">\n' +
                                                '                            <span class="text-white">';
                                            $.each(xhr.responseJSON.errors, function(key,value) {
                                                errorMessage +=(''+value+'<br>');
                                            });
                                            errorMessage +='</span>\n' +
                                                '                        </div>\n' +
                                                '                    </div>';
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                footer: errorMessage
                                            })
                                        },
                                    })
                            });

                        });

                    </script>
                @endcan

            <!--End Row-->
            @endcan
        </div>
        <!-- End container-fluid-->
    </div>
@endsection
@push('footer')

@endpush


