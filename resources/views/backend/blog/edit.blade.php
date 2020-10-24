@extends('backend.layouts.app')
@push('title') Create blog @endpush
@push('header')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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
                        <li class="breadcrumb-item active" aria-current="page">Create blog</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            @can('add-hotel')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Image</span>
                            </div>
                            <input name="image" accept="image/*" id="image" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Title &nbsp;</span>
                            </div>
                            <input required name="title" id="title" type="text" class="form-control" value="{{ $blog->title }}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <textarea required name="description" id="description" class="summernote" cols="30" rows="10" placeholder="Write description">{!! $blog->description !!}</textarea>
                                        <input type="hidden" class="hidden-id" value="{{ $blog->id }}">
                                        <button type="button" class="btn btn-danger btn-block waves-effect waves-light mb-1 submit-btn">SUBMIT now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->
                <script>
                    $('.summernote').summernote({
                        placeholder: 'Hello stand alone ui',
                        tabsize: 2,
                        height: 500,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                        ]
                    });
                </script>
                <!--End Row-->
            @endcan
        </div>
        <!-- End container-fluid-->
    </div>


    <!-- Edit Modal -->
    <script>
        $(document).ready(function() {
            @can('add-blog')
            //Show modal for add
            $('.submit-btn').click(function(){
                var formData = new FormData();
                formData.append('blog', $('.hidden-id').val())
                formData.append('title', $('#title').val())
                formData.append('description', $('#description').val())
                formData.append('image', $('#image')[0].files[0])
                $.ajax({
                    method: 'POST',
                    url: "{{ route('backend.blog.update') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function (){
                        $('.submit-btn').html('Please wait ---- ');
                        $('.submit-btn').prop("disabled",true);
                    },
                    complete: function (){
                        $('.submit-btn').html('Submit Now');
                        $('.submit-btn').prop("disabled",false);
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
        });

    </script>
@endsection
@push('footer')

@endpush


