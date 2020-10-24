@extends('backend.layouts.app')
@push('title') Blogs @endpush
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
                        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                    </ol>
                </div>
                <div class="col-sm-3">
                    <div class="btn-group float-sm-right">
                        @can('add-blog')
                        <button type="button" id="add-new" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-plus"></i> Add new blog</button>
                        @endcan
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb-->
            @can('view-blog')
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-text">{!! $blog->description !!}</p>
                                <p class="card-text"><small class="text-muted"> {{ $blog->created_at->format('d-M-Y') }}</small></p>
                            </div>
                            <img height="300" class="card-img-bottom" src="{{ asset('uploads/images/'.$blog->image) }}">
                            @canany(['edit-blog', 'delete-blog'])
                                <hr class="border-warning">
                                <input type="hidden" class="hidden-id" value="{{ $blog->id }}">
                                <a href="{{ route('backend.blog.edit', $blog->id) }}" class="btn btn-inverse-warning waves-effect waves-light m-1 edit-btn"><i class="fa fa-globe mr-1"></i> Edit</a>
                                <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1 delete-btn"><i class="fa fa-star mr-1"></i> Delete</a>
                            @endcanany
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--End Row-->
            @endcan
        </div>
        <!-- End container-fluid-->
    </div>

    <script>
        $(document).ready(function() {
            @can('add-blog')
            $('#add-new').click(function(){
                location.replace("{{ route('backend.blog.create') }}")
            });
            @endcan
            @can('delete-blog')
            //Submit deleted
            $('.delete-btn').click(function(){
                var formData = new FormData();
                formData.append('blog', $(this).parent().find('.hidden-id').val())
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
                            url: "{{ route('backend.blog.delete') }}",
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


