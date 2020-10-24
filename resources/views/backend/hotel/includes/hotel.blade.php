<div class="row">
    <div class="col-md-6 col-lg-6 col-xl-6">
        <div class="profile-card-2">
            <div class="card profile-success">
                <div class="card-body text-center">
                    <div class="user-box">
                        <img src="{{ asset('assets/images/avatars/avatar-6.png') }}" alt="user avatar">
                    </div>
                    <h5 class="mb-1"><b>{{ $hotel->name }}</b></h5>
                    <h6 class="text-muted">{{ $hotel->address }}</h6>
                    <div class="row">
                        <div class="col border-light border-right p-2">
                            <h6 class="mb-0">{{ $hotel->bookings->where('status', '1')->count() }}</h6>
                            <p class="mb-0">Booking</p>
                        </div>
                        <div class="col p-2">
                            <h6 class="mb-0">{{ $hotel->visitor }}</h6>
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
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>Trade Licence</b>
                    @canany(['edit-my-hotel', 'edit-hotel'])
                        <img src="" id="license-image-previewer" class="card-img-top">
                        <input style="display: none" type="file" accept="image/*" id="license-image-importer" class="image-file">
                        <button type="button" class="btn btn-outline-warning waves-effect waves-light m-1" id="add-license-image-btn"> <i class="fa fa-edit"></i> </button>
                    @endcanany
                </h5>
            </div>
            <img class="card-img-bottom" height="310" src="{{ asset('/uploads/images/'.$hotel->trade_license) }}" alt="Trade License Image">
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header text-uppercase">Banner/Cover images</div>
            <div class="card-body">
                <div id="carousel-3" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($hotel->images->where('type', 'banner') as $image)
                        <div class="carousel-item @if($loop->iteration == 1) active @endif ">
                            <img class="d-block w-100" height="200" src="{{ asset('uploads/images/'.$image->image) }}" alt="First slide">
                        </div>
                        @endforeach
                    </div>
                </div>
                @canany(['edit-my-hotel', 'edit-hotel'])
                <div class="row">
                    @foreach($hotel->images->where('type', 'banner') as $image)
                    <div class="col-lg-3">
                        <div class="card card-danger">
                            <img height="50" src="{{ asset('uploads/images/'.$image->image) }}" class="card-img-top edit-image-previewer">
                            <div class="card-body">
                                <input style="display: none" type="file" accept="image/*" class="editable-image-file">
                                <input type="hidden" class="image-id" value="{{ \Illuminate\Support\Facades\Crypt::encryptString($image->id) }}">
                                <button type="button" class="btn btn-outline-warning waves-effect waves-light m-1 edit-image-btn" id="" value="*banner"> <i class="fa fa-edit"></i> </button>
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
                                <button type="button" class="btn btn-outline-success waves-effect waves-light m-1 image-submit" id="upload-banner-image-btn" value="+banner"> <i class="zmdi zmdi-check-circle"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endcanany
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header text-uppercase">Reception images</div>
            <div class="card-body">
                <div id="carousel-3" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($hotel->images->where('type', 'reception') as $image)
                            <div class="carousel-item @if($loop->iteration == 1) active @endif ">
                                <img class="d-block w-100" height="200" src="{{ asset('uploads/images/'.$image->image) }}" alt="First slide">
                            </div>
                        @endforeach
                    </div>
                </div>
                @canany(['edit-my-hotel', 'edit-hotel'])
                    <div class="row">
                        @foreach($hotel->images->where('type', 'reception') as $image)
                            <div class="col-lg-3">
                                <div class="card card-danger">
                                    <img height="50" src="{{ asset('uploads/images/'.$image->image) }}" class="card-img-top">
                                    <div class="card-body">
                                        <input style="display: none" type="file" accept="image/*" class="editable-image-file">
                                        <input type="hidden" class="image-id" value="{{ \Illuminate\Support\Facades\Crypt::encryptString($image->id) }}">
                                        <button type="button" class="btn btn-outline-warning waves-effect waves-light m-1 edit-image-btn" id="" value="*reception"> <i class="fa fa-edit"></i> </button>
                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light m-1 delete-image-btn"> <i class="fa fa-trash-o"></i> </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-3">
                            <div class="card card-danger">
                                <div class="card-body">
                                    <img src="" id="reception-image-previewer" class="card-img-top">
                                    <input style="display: none" type="file" accept="image/*" id="reception-image-importer" class="image-file">
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light m-1" id="add-reception-image-btn"> <i class="fa fa-plus"></i> </button>
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light m-1 image-submit" id="upload-reception-image-btn" value="+reception"> <i class="zmdi zmdi-check-circle"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcanany
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header text-uppercase">Pool images</div>
            <div class="card-body">
                <div id="carousel-3" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($hotel->images->where('type', 'pool') as $image)
                            <div class="carousel-item @if($loop->iteration == 1) active @endif ">
                                <img class="d-block w-100" height="200" src="{{ asset('uploads/images/'.$image->image) }}" alt="First slide">
                            </div>
                        @endforeach
                    </div>
                </div>
                @canany(['edit-my-hotel', 'edit-hotel'])
                    <div class="row">
                        @foreach($hotel->images->where('type', 'pool') as $image)
                            <div class="col-lg-3">
                                <div class="card card-danger">
                                    <img height="50" src="{{ asset('uploads/images/'.$image->image) }}" class="card-img-top">
                                    <div class="card-body">
                                        <input style="display: none" type="file" accept="image/*" class="editable-image-file">
                                        <input type="hidden" class="image-id" value="{{ \Illuminate\Support\Facades\Crypt::encryptString($image->id) }}">
                                        <button type="button" class="btn btn-outline-warning waves-effect waves-light m-1 edit-image-btn" id="" value="*pool"> <i class="fa fa-edit"></i> </button>
                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light m-1 delete-image-btn"> <i class="fa fa-trash-o"></i> </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-3">
                            <div class="card card-danger">
                                <div class="card-body">
                                    <img src="" id="pool-image-previewer" class="card-img-top">
                                    <input style="display: none" type="file" accept="image/*" id="pool-image-importer" class="image-file">
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light m-1" id="add-pool-image-btn"> <i class="fa fa-plus"></i> </button>
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light m-1 image-submit" id="upload-pool-image-btn" value="+pool"> <i class="zmdi zmdi-check-circle"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcanany
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header text-uppercase">Highlight (Spa, Restaurant) images</div>
            <div class="card-body">
                <div id="carousel-3" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($hotel->images->where('type', 'highlight') as $image)
                            <div class="carousel-item @if($loop->iteration == 1) active @endif ">
                                <img class="d-block w-100" height="200" src="{{ asset('uploads/images/'.$image->image) }}" alt="First slide">
                            </div>
                        @endforeach
                    </div>
                </div>
                @canany(['edit-my-hotel', 'edit-hotel'])
                    <div class="row">
                        @foreach($hotel->images->where('type', 'highlight') as $image)
                            <div class="col-lg-3">
                                <div class="card card-danger">
                                    <img height="50" src="{{ asset('uploads/images/'.$image->image) }}" class="card-img-top">
                                    <div class="card-body">
                                        <input style="display: none" type="file" accept="image/*" class="editable-image-file">
                                        <input type="hidden" class="image-id" value="{{ \Illuminate\Support\Facades\Crypt::encryptString($image->id) }}">
                                        <button type="button" class="btn btn-outline-warning waves-effect waves-light m-1 edit-image-btn" id="" value="*highlight"> <i class="fa fa-edit"></i> </button>
                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light m-1 delete-image-btn"> <i class="fa fa-trash-o"></i> </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-3">
                            <div class="card card-danger">
                                <div class="card-body">
                                    <img src="" id="highlight-image-previewer" class="card-img-top">
                                    <input style="display: none" type="file" accept="image/*" id="highlight-image-importer" class="image-file">
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light m-1" id="add-highlight-image-btn"> <i class="fa fa-plus"></i> </button>
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light m-1 image-submit" id="upload-highlight-image-btn" value="+highlight"> <i class="zmdi zmdi-check-circle"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcanany
            </div>
        </div>
    </div>
</div>



@canany(['edit-my-hotel', 'edit-hotel'])
    <script>
        $(document).ready(function() {
            //Add license
            $("#add-license-image-btn").click(function (){
                $('#license-image-importer').click();
            })
            //Submit license image
            $('#license-image-importer').change(function(){
                var formData = new FormData();
                formData.append('hotel', $('#hidden-id').val())
                formData.append('purpose', 'license')
                formData.append('image', $('#license-image-importer')[0].files[0])
                $.ajax({
                    method: 'POST',
                    url: "{{ route('backend.hotel.update') }}",
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

             //Add reception
            $("#add-reception-image-btn").click(function (){
                $('#reception-image-importer').click();
            })
            //Preview reception
            $("#reception-image-importer").change(function (event){
                if(event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("reception-image-previewer");
                    preview.src = src;
                    preview.style.display = "block";
                }
            })

            //Add pool
            $("#add-pool-image-btn").click(function (){
                $('#pool-image-importer').click();
            })
            //Preview pool
            $("#pool-image-importer").change(function (event){
                if(event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("pool-image-previewer");
                    preview.src = src;
                    preview.style.display = "block";
                }
            })

            //Add highlight
            $("#add-highlight-image-btn").click(function (){
                $('#highlight-image-importer').click();
            })
            //Preview highlight
            $("#highlight-image-importer").change(function (event){
                if(event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("highlight-image-previewer");
                    preview.src = src;
                    preview.style.display = "block";
                }
            })

            //Submit all images for new add
            $('.image-submit').click(function(){
                var formData = new FormData();
                formData.append('hotel', $('#hidden-id').val())
                formData.append('purpose', $(this).val())
                formData.append('image', $(this).parent().find('.image-file')[0].files[0])
                $.ajax({
                    method: 'POST',
                    url: "{{ route('backend.hotel.update') }}",
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
                    formData.append('hotel', $('#hidden-id').val())
                    formData.append('purpose', $(this).parent().find('.edit-image-btn').val())
                    formData.append('selected_image', $(this).parent().find('.image-id').val())
                    formData.append('image',$(this).parent().find('.editable-image-file')[0].files[0])
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('backend.hotel.update') }}",
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
                        formData.append('hotel', $('#hidden-id').val())
                        formData.append('purpose', 'delete-image')
                        formData.append('selected_image', $(this).parent().find('.image-id').val())
                        $.ajax({
                            method: 'POST',
                            url: "{{ route('backend.hotel.update') }}",
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
        });

    </script>
@endcanany
