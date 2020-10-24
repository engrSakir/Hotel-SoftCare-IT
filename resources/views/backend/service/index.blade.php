@extends('backend.layouts.app')
@push('title') Services @endpush
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
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
                    </ol>
                </div>
                <div class="col-sm-3">
                    <div class="btn-group float-sm-right">
                        @can('add-service-category')
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light add-service-category-btn"><i class="fa fa-plus"></i> Add new service category</button>
                        @endcan
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb-->
            @can('view-service-category')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="tabs-vertical tabs-vertical-warning">
                                            <ul class="nav nav-tabs flex-column">
                                                @foreach($categories as $category)
                                                <li class="nav-item">
                                                    <a class="nav-link py-4 @if($loop->iteration == 1) active show @endif" data-toggle="tab" href="#tabe-{{ str_replace(str_split('\\/:*?"<>|+-.& '), '-', $category->name) }}"><i class="icon-home"></i> <span class="hidden-xs service-category-name">{{ $category->name }}</span></a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            @foreach($categories as $category)
                                            <div id="tabe-{{ str_replace(str_split('\\/:*?"<>|+-.& '), '-', $category->name) }}" class="container tab-pane fade  @if($loop->iteration == 1) active show @endif">
                                                @can('view-service')
                                                <ul class="list-group mb-3">
                                                    <li class="list-group-item active-danger service-category-name">{{ $category->name }}</li>
                                                    <input type="hidden" class="hidden-category-id" value="{{ $category->id }}">
                                                    @foreach($category->services as $service)
                                                    <li class="list-group-item">
                                                        @can('edit-service')
                                                        <button value="{{ $service->id }}" type="button" class="btn btn-outline-success waves-effect waves-light m-1 edit-service-btn"> <i class="fa fa-edit"></i> </button>
                                                        @endcan
                                                        @can('delete-service')
                                                        <button value="{{ $service->id }}" type="button" class="btn btn-outline-danger waves-effect waves-light m-1 delete-service-btn"> <i class="fa fa-trash-o"></i> </button>
                                                        @endcan
                                                        <b class="service-name">{{ $service->name }}</b>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endcan
                                                @canany(['edit-service-category', 'delete-service-category'])
                                                <div class="btn-group m-1">
                                                    <div class="row">
                                                        <div class="col">
                                                            @can('edit-service-category')
                                                                <button type="button" class="btn btn-outline-primary waves-effect waves-light edit-service-category-btn"> <i class="fa fa-edit"></i> <span>Edit service category</span> </button>
                                                            @endcan
                                                        </div>
                                                        <div class="col">
                                                            @can('delete-service-category')
                                                                <button type="button" class="btn btn-outline-danger waves-effect waves-light delete-service-category-btn"> <i class="fa fa fa-trash-o"></i> <span>Delete service category</span> </button>
                                                            @endcan
                                                        </div>
                                                        <div class="col">
                                                            @can('add-service')
                                                                <button type="button" class="btn btn-outline-success waves-effect waves-light add-service-btn"> <i class="fa fa fa-plus"></i> <span>Add service in <b>{{ $category->name }}</b></span> </button>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </div>
                                                @endcan
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div><!--End Row-->
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
                    <form action="#" id="modal-from">
                        <input type="hidden" id="hidden-id">
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Name</span>
                            </div>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Icon</span>
                            </div>
                            <input type="text" class="form-control" name="icon" id="icon">
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <input type="file" class="form-control valid" accept="image/*" id="image" name="image" required="" aria-invalid="false">
                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" ><i class="fa fa-times"></i> Close</button>
                    @canany(['add-service-category', 'add-service'])
                        <button type="button" class="btn btn-primary" id="add-submit-button"><i class="fa fa-check-square-o"></i> Add now</button>
                    @endcanany
                    @canany(['edit-service-category', 'edit-service'])
                        <button type="button" class="btn btn-primary" id="edit-submit-button"><i class="fa fa-check-square-o"></i> Edit now</button>
                    @endcanany
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <script>
        $(document).ready(function() {
            @can('add-service-category')
            //Show modal for add-service-category
            $('.add-service-category-btn').click(function(){
                $('#modal').modal('show');
                $('#edit-submit-button').hide();
                $('#add-submit-button').show();
                $('#add-submit-button').val('category');
                $('#modal-title').html('Add a new service category');
                $('#modal-from').trigger("reset");
            });
            @endcan
            @can('add-service')
            //Show modal for add-service
            $('.add-service-btn').click(function(){
                $('#modal').modal('show');
                $('#edit-submit-button').hide();
                $('#add-submit-button').show();
                $('#add-submit-button').val('service');
                $('#hidden-id').val($(this).parent().parent().parent().parent().find('.hidden-category-id').val());
                $('#modal-title').html('Add a new service');
                $('#modal-from').trigger("reset");
            });
            @endcan
            @canany(['add-service', 'add-service-category'])
            //Submit new service and service category
            $('#add-submit-button').click(function(){
                var formData = new FormData();
                formData.append('type', $(this).val())
                formData.append('category', $('#hidden-id').val())
                formData.append('name', $('#name').val())
                formData.append('icon', $('#icon').val())
                formData.append('image', $('#image')[0].files[0])
                $.ajax({
                    method: 'POST',
                    url: "{{ route('backend.service-category.store') }}",
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
                            $('#modal-from').trigger("reset");
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
            @endcanany
            @can('edit-service-category')
            //Show modal for edit and set data Service Category
            $(".edit-service-category-btn").click(function(){
                $('#modal').modal('show');
                $('#modal-title').html('Edit service category');
                $('#add-submit-button').hide();
                $('#edit-submit-button').show();
                $('#edit-submit-button').val('category');
                $('#name').val($(this).parent().parent().parent().parent().find('.service-category-name').text());
                $('#hidden-id').val($(this).parent().parent().parent().parent().find('.hidden-category-id').val());
            });
            @endcan
            @can('edit-service')
            //Show modal for edit and set data Service
            $(".edit-service-btn").click(function(){
                $('#modal').modal('show');
                $('#modal-title').html('Edit service category');
                $('#add-submit-button').hide();
                $('#edit-submit-button').show();
                $('#edit-submit-button').val('service');
                $('#name').val($(this).parent().find('.service-name').text());
                $('#hidden-id').val($(this).val());
            });
            @endcan
            @canany(['edit-service', 'edit-service-category'])
            //Edit Submit service and service category
            $('#edit-submit-button').click(function(){
                var formData = new FormData();
                formData.append('type', $(this).val())
                formData.append('selector_id', $('#hidden-id').val())
                formData.append('name', $('#name').val())
                formData.append('icon', $('#icon').val())
                formData.append('image', $('#image')[0].files[0])
                $.ajax({
                    method: 'POST',
                    url: "{{ route('backend.service-category.update') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function (){
                        $("#add-submit-button").html('Please wait ---- ');
                        $("#add-submit-button").prop("disabled",true);
                    },
                    complete: function (){
                        $("#add-submit-button").html('Edit now');
                        $("#add-submit-button").prop("disabled",false);
                    },
                    success: function (data) {
                        if (data.type == 'success'){
                            $('#modal').modal('hide');
                            $('#modal-from').trigger("reset");
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
            @endcanany
            @can('delete-service-category')
            //Submit deleted category
            $('.delete-service-category-btn').click(function(){
                var formData = new FormData();
                formData.append('type', 'category')
                formData.append('selector_id', $(this).parent().parent().parent().parent().find('.hidden-category-id').val())
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
                            url: "{{ route('backend.service-category.delete') }}",
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
            @can('delete-service')
            //Submit deleted service
            $('.delete-service-btn').click(function(){
                var formData = new FormData();
                formData.append('type', 'service')
                formData.append('selector_id', $(this).val())
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
                            url: "{{ route('backend.service-category.delete') }}",
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


