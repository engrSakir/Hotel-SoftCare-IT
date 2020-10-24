@extends('backend.layouts.app')
@push('title') Locations @endpush
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
                        <li class="breadcrumb-item active" aria-current="page">Location</li>
                    </ol>
                </div>
                <div class="col-sm-3">
                    <div class="btn-group float-sm-right">
                        @can('add-location')
                        <button type="button" id="add-new" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-plus"></i> Add new location</button>
                        @endcan
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb-->
            @can('view-location')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Locations</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-danger shadow-danger">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        @canany(['edit-location', 'delete-location'])
                                        <th scope="col">Action</th>
                                        @endcanany
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($locations as $location)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="name">{{ $location->name }}</td>
                                        <td>
                                            <input type="hidden" class="hidden-id" value="{{ $location->id }}">
                                            @can('edit-location')
                                                <button type="button" class="btn btn-success waves-effect waves-light m-1 edit-btn"> <i class="fa fa-edit"></i> </button>
                                            @endcan
                                            @can('delete-location')
                                                    <button type="button" class="btn btn-danger waves-effect waves-light m-1 delete-btn"> <i class="fa fa-trash-o"></i> </button>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
            @can('add-location')
            //Show modal for add
            $('#add-new').click(function(){
                $('#modal').modal('show');
                $('#edit-submit-button').hide();
                $('#add-submit-button').show();
                $('#modal-title').html('Add a new location');
                $('#name').val('');
            });

            //Submit new location
            $('#add-submit-button').click(function(){
                var formData = new FormData();
                formData.append('name', $('#name').val())
                $.ajax({
                    method: 'POST',
                    url: "{{ route('backend.location.store') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function (){
                        $("#add-submit-button").html('Please wait ---- ');
                        $("#add-submit-button").prop("disabled",true);
                    },
                    complete: function (){
                        $("#add-submit-button").html('Add new location');
                        $("#add-submit-button").prop("disabled",false);
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
            @endcan
            @can('edit-location')
            //Show modal for edit and set data
            $(".edit-btn").click(function(){
                $('#modal').modal('show');
                $('#modal-title').html('Edit location');
                $('#add-submit-button').hide();
                $('#edit-submit-button').show();
                $('#name').val($(this).parent().parent().find('.name').text());
                $('#location-id').val($(this).parent().parent().find('.hidden-id').val());
            });

            //Submit edited
            $('#edit-submit-button').click(function(){
                var formData = new FormData();
                formData.append('location', $('#location-id').val())
                formData.append('name', $('#name').val())
                $.ajax({
                    method: 'POST',
                    url: "{{ route('backend.location.update') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function (){
                        $("#edit-submit-button").html('Please wait ---- ');
                        $("#edit-submit-button").prop("disabled",true);
                    },
                    complete: function (){
                        $("#edit-submit-button").html('Edit location');
                        $("#edit-submit-button").prop("disabled",false);
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
            @endcan
            @can('delete-location')
            //Submit deleted
            $('.delete-btn').click(function(){
                var formData = new FormData();
                formData.append('location', $(this).parent().parent().find('.hidden-id').val())
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
                        $.ajax({
                            method: 'POST',
                            url: "{{ route('backend.location.delete') }}",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: formData,
                            processData: false,
                            contentType: false,
                            beforeSend: function (){

                            },
                            complete: function (){

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
                    }
                })

            });
            @endcan
        });

    </script>

@endsection
@push('footer')

@endpush


