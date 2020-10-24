@extends('backend.layouts.app')
@push('title') Hotel @endpush
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
                        <li class="breadcrumb-item active" aria-current="page">Hotel</li>
                    </ol>
                </div>
                <div class="col-sm-3">
                    <div class="btn-group float-sm-right">
                        @can('add-hotel')
                        <button type="button" id="add-new" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-plus"></i> Add new hotel</button>
                        @endcan
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb-->
            @can('view-hotel')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Hotels</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-danger shadow-danger">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Location</th>
                                        @canany(['edit-hotel', 'delete-hotel'])
                                        <th scope="col">Action</th>
                                        @endcanany
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hotels as $hotel)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="name">{{ $hotel->name }}</td>
                                        <td class="name">{{ $hotel->phone }}</td>
                                        <td class="name">{{ $hotel->location->name }}</td>
                                        <td>
                                            <input type="hidden" class="hidden-id" value="{{ $hotel->id }}">
                                            @can('view-hotel')
                                                <a href="{{ route('backend.hotel.show',\Illuminate\Support\Facades\Crypt::encryptString($hotel->id)) }}" type="button" class="btn text-white btn-success waves-effect waves-light m-1 view-btn"> <i class="fa fa-eye"></i> </a>
                                            @endcan
                                            @can('approval-hotel')
                                                @if($hotel->status == 1)
                                                <button type="button" class="btn btn-success waves-effect waves-light m-1 approval-btn"> <i class="zmdi zmdi-check-circle"></i> </button>
                                                @else
                                                    <button type="button" class="btn btn-warning waves-effect waves-light m-1 approval-btn"> <i class="zmdi zmdi-check-circle"></i> </button>
                                                @endif
                                            @endcan
                                            @can('delete-hotel')
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

    <script>
        $(document).ready(function() {
            @can('add-hotel')
            //Show modal for add
            $('#add-new').click(function(){
                location.replace("{{ route('backend.hotel.create') }}")
            });
            @endcan
            @can('edit-hotel')
            //Show modal for edit and set data
            $(".edit-btn").click(function(){
                $('#modal').modal('show');
                $('#modal-title').html('Edit location');
                $('#add-submit-button').hide();
                $('#edit-submit-button').show();
                $('#name').val($(this).parent().parent().find('.name').text());
                $('#location-id').val($(this).parent().parent().find('.hidden-id').val());
            });
            @endcan
            @can('delete-hotel')
            //Submit deleted
            $('.delete-btn').click(function(){
                var formData = new FormData();
                formData.append('hotel', $(this).parent().parent().find('.hidden-id').val())
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
                            url: "{{ route('backend.hotel.delete') }}",
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

            @can('approval-hotel')
            $('.approval-btn').click(function(){
                var formData = new FormData();
                formData.append('purpose', 'approval')
                formData.append('hotel', $(this).parent().parent().find('.hidden-id').val())
                Swal.fire({
                    title: 'Activate/Deactivate',
                    text: "Are you want to change status ?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'POST',
                            url: "{{ route('backend.hotel.update') }}",
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


