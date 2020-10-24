@extends('backend.layouts.app')
@push('title') Show hotel @endpush
@push('header')
    <!-- Dropzone css -->
    <link href="{{ asset('assets/plugins/dropzone/css/dropzone.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">{{ $setting->name }} </h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show hotel</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            @canany(['view-hotel', 'view-my-hotel'])
                <input type="hidden" id="hidden-id" value="{{ $hotel->id }}">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-success top-icon">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="tab" href="#home"><i class="icon-home"></i> <span class="hidden-xs">Home</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#owner"><i class="icon-user"></i> <span class="hidden-xs">Owner</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#hotel"><i class="zmdi zmdi-hotel"></i> <span class="hidden-xs">Hotel</span></a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="home" class="container tab-pane active show">
                                        @include('backend.hotel.includes.home')
                                    </div>
                                    <div id="owner" class="container tab-pane fade">
                                        @include('backend.hotel.includes.owner')
                                    </div>
                                    <div id="hotel" class="container tab-pane fade">
                                        @include('backend.hotel.includes.hotel')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->
            @endcanany
        </div>
        <!-- End container-fluid-->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"><i class="fa fa-star"></i> <!--Title insert by ajax--> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                    <form action="#" id="add-new-from">
                        <input type="hidden" id="location-id">
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Name</span>
                            </div>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" ><i class="fa fa-times"></i> Close</button>
                    @can('add-location')
                        <button type="button" class="btn btn-primary" id="add-submit-button"><i class="fa fa-check-square-o"></i> Add new location</button>
                    @endcan
                    @can('edit-location')
                        <button type="button" class="btn btn-primary" id="edit-submit-button"><i class="fa fa-check-square-o"></i> Edit location</button>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <script>
        $(document).ready(function() {
            @can('add-hotel')
            //Show modal for add
            $('#add-hotel-btn').click(function(){
                var formData = new FormData();
                formData.append('hotel_name', $('#hotel_name').val())
                formData.append('hotel_location', $('#hotel_location').val())
                formData.append('owner_name', $('#owner_name').val())
                formData.append('owner_mobile', $('#owner_mobile').val())
                formData.append('owner_password', $('#owner_password').val())
                $.ajax({
                    method: 'POST',
                    url: "{{ route('backend.hotel.store') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function (){
                        $(this).html('Please wait ---- ');
                        $(this).prop("disabled",true);
                    },
                    complete: function (){
                        $(this).html('Add new location');
                        $(this).prop("disabled",false);
                    },
                    success: function (data) {
                        if (data.type == 'success'){
                            $('#modal').modal('hide');
                            $('#name').val('');
                            Swal.fire({
                                position: 'top-end',
                                icon: data.type,
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(function() {
                                location.reload();
                            }, 800);//
                        }else{
                            Swal.fire({
                                icon: data.type,
                                title: 'Oops...',
                                text: data.message,
                                footer: 'Something went wrong!'
                            })
                        }
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

            //Submit new location
            $('#reset-form-btn').click(function(){
                $('#hotel-add-form').trigger("reset");
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Clearing ...',
                    showConfirmButton: false,
                    timer: 500
                })
            });
            @endcan
        });

    </script>

@endsection
@push('footer')
    <script src="{{ asset('assets/plugins/dropzone/js/dropzone.js') }}"></script>
@endpush


