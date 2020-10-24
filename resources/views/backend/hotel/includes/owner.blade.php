
    <div class="row">
        @foreach($hotel->owners as $owner)
        <div class="col-12 @if($setting->advance_ownership == 1) col-lg-6 col-xl-4 @else col-lg-12 col-xl-12 @endif ">
            <div class="profile-card-4">
                <div class="card">
                    <div class="card-body text-center gradient-ibiza rounded-top">
                        <div class="user-box">
                            <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" alt="user avatar">
                        </div>
                        <h5 class="mb-1 text-white">{{ $owner->user->name }}</h5>
                        <h6 class="text-light">Hotel Owner</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group shadow-none">
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="fa fa-phone-square"></i>
                                </div>
                                <div class="list-details">
                                    <span>{{ $owner->user->phone }}</span>
                                    <small>Mobile Number</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="list-details">
                                    <span>{{ $owner->user->email }}</span>
                                    <small>Email Address</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="list-details">
                                    <span>{{ $owner->user->website }}</span>
                                    <small>Website Address</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="zmdi zmdi-pin-drop"></i>
                                </div>
                                <div class="list-details">
                                    <span>{{ $owner->user->address }}</span>
                                    <small>Contact Address</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="zmdi zmdi-view-array"></i>
                                </div>
                                <div class="list-details">
                                    <span>{{ $owner->user->nid }}</span>
                                    <small> National ID</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ $owner->user->facebook }}" target="_blank" class="btn-social btn-facebook waves-effect waves-light m-1"><i class="fa fa-facebook"></i></a>
                        <a href="{{ $owner->user->google }}" target="_blank" class="btn-social btn-google-plus waves-effect waves-light m-1"><i class="fa fa-google-plus"></i></a>
                        <a href="{{ $owner->user->twitter }}" target="_blank" class="btn-social btn-twitter waves-effect waves-light m-1"><i class="fa fa-twitter"></i></a>
                        <a href="{{ $owner->user->linkedin }}" target="_blank" class="btn-social btn-linkedin waves-effect waves-light m-1"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-12 col-xl-12">
            @canany(['edit-my-hotel', 'edit-hotel'])
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="accordion6">
                            <div class="card mb-2 bg-success">
                                <div class="card-header bg-transparent">
                                    <button class="btn btn-link shadow-none text-white" data-toggle="collapse" data-target="#collapse-owner" aria-expanded="true" aria-controls="collapse-16">
                                        <b>Update Owner Information</b>
                                    </button>
                                </div>
                                <div id="collapse-owner" class="collapse" data-parent="#accordion6">
                                    <div class="card-body text-white">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form id="package-submition-form">
                                                            <div class="form-group">
                                                                <label for="owner-name">Owner name</label>
                                                                <input type="text" class="form-control form-control-square" id="owner-name"  value="{{ $owner->user->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="owner-logo">Owner image</label>
                                                                <input type="file" accept="image/*" class="form-control form-control-square" id="owner-image">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="owner-nid">Owner nid</label>
                                                                <input type="text" class="form-control form-control-square" id="owner-nid" value="{{ $owner->user->nid }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="owner-phone">Owner phone</label>
                                                                <input type="text" class="form-control form-control-square" id="owner-phone" value="{{ $owner->user->phone }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="owner-facebook">Owner facebook</label>
                                                                <input type="text" class="form-control form-control-square" id="owner-facebook" value="{{ $owner->user->facebook }}">
                                                            </div><div class="form-group">
                                                                <label for="owner-instagram">Owner instagram</label>
                                                                <input type="text" class="form-control form-control-square" id="owner-instagram" value="{{ $owner->user->instagram }}">
                                                            </div><div class="form-group">
                                                                <label for="owner-twitter">Owner twitter</label>
                                                                <input type="text" class="form-control form-control-square" id="owner-twitter" value="{{ $owner->user->twitter }}">
                                                            </div><div class="form-group">
                                                                <label for="owner-google">Owner google</label>
                                                                <input type="text" class="form-control form-control-square" id="owner-google" value="{{ $owner->user->google }}">
                                                            </div><div class="form-group">
                                                                <label for="owner-youtube">Owner youtube</label>
                                                                <input type="text" class="form-control form-control-square" id="owner-youtube" value="{{ $owner->user->youtube }}">
                                                            </div><div class="form-group">
                                                                <label for="owner-linkedin">Owner linkedin</label>
                                                                <input type="text" class="form-control form-control-square" id="owner-linkedin" value="{{ $owner->user->linkedin }}">
                                                            </div><div class="form-group">
                                                                <label for="owner-whatsapp">Owner whatsapp</label>
                                                                <input type="text" class="form-control form-control-square" id="owner-whatsapp" value="{{ $owner->user->whatsapp }}">
                                                            </div><div class="form-group">
                                                                <label for="owner-website">Owner website</label>
                                                                <input type="text" class="form-control form-control-square" id="owner-website" value="{{ $owner->user->website }}">
                                                            </div>

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

                                                            <div class="form-footer">
                                                                <button type="button" class="btn btn-danger btn-block waves-effect waves-light mb-1 update-owner-info-btn">SUBMIT NOW</button>
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

                <script>
                    $(document).ready(function() {
                        //Update hotel information
                        $(".update-owner-info-btn").click(function (){
                            var formData = new FormData();
                            formData.append('name', $('#hotel-name').val())
                            formData.append('logo',$('#hotel-logo')[0].files[0])
                            formData.append('location', $('#location_id').val())
                            formData.append('address', $('#hotel-address').val())
                            formData.append('phone', $('#hotel-phone').val())
                            formData.append('facebook', $('#hotel-facebook').val())
                            formData.append('instagram', $('#hotel-instagram').val())
                            formData.append('twitter', $('#hotel-twitter').val())
                            formData.append('google', $('#hotel-google').val())
                            formData.append('youtube', $('#hotel-youtube').val())
                            formData.append('linkedin', $('#hotel-linkedin').val())
                            formData.append('whatsapp', $('#hotel-whatsapp').val())
                            formData.append('website', $('#hotel-website').val())
                            formData.append('manager', $('#hotel-manager').val())
                            formData.append('description', $('#hotel-description').val())
                            formData.append('hotel', $('#hidden-id').val())
                            formData.append('purpose', 'hotel-information')
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

                    });

                </script>
            @endcanany
        </div>
        @endforeach
    </div>

