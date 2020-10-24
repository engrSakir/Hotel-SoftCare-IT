@extends('backend.layouts.app')
@push('title') Edit hotel @endpush
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
                        <li class="breadcrumb-item active" aria-current="page">Edit hotel</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            @can('edit-hotel')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-bordered" id="hotel-add-form">
                                    <h4 class="form-header text-uppercase">
                                        <i class="zmdi zmdi-hotel"></i>
                                       Hotel Info &nbsp; <span class="badge badge-pill badge-danger shadow-danger m-1">Required</span>
                                    </h4>
                                    <div class="form-group row">
                                        <label for="input-1" class="col-sm-2 col-form-label"> <b class="text-danger">*</b>Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="hotel_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-6" class="col-sm-2 col-form-label"> <b class="text-danger">*</b>Location</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="hotel_location">
                                                <option disabled selected> Chose location </option>
                                                @foreach($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <h4 class="form-header text-uppercase">
                                        <i class="fa fa-user-circle-o"></i>
                                        Owner Info &nbsp; @if($setting->advance_ownership == 0) <span class="badge badge-pill badge-danger shadow-danger m-1">Required</span> @else <span class="badge badge-pill badge-info shadow-info m-1">Not required</span> @endif
                                    </h4>
                                    <div class="form-group row">
                                        <label for="input-2" class="col-sm-2 col-form-label">@if($setting->advance_ownership == 0)  <b class="text-danger">*</b> @endif Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="owner_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-3" class="col-sm-2 col-form-label"> @if($setting->advance_ownership == 0)  <b class="text-danger">*</b> @endif Mobile</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="owner_mobile">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-3" class="col-sm-2 col-form-label"> @if($setting->advance_ownership == 0)  <b class="text-danger">*</b> @endif Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="owner_password">
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <button type="button" class="btn btn-danger shadow-danger m-1" id="reset-form-btn"><i class="fa fa-times"></i> Reset</button>
                                        <button type="button" class="btn btn-success shadow-success m-1" id="add-hotel-btn"><i class="fa fa-check-square-o"></i> SAVE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->
            @endcan
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

@endpush


