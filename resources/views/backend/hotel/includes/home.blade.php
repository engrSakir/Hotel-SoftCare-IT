
<div class="row">
    <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
        <div class="card gradient-violet">
            <div class="card-body">
                <div class="media">
                    <div class="align-self-center w-circle-icon rounded bg-contrast">
                        <i class="icon-eye text-white"></i></div>
                    <div class="media-body text-right">
                        <h4 class="text-white">{{ $hotel->visitor }}</h4>
                        <span class="text-white">Total Visitor</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
        <div class="card gradient-ibiza">
            <div class="card-body">
                <div class="media">
                    <div class="align-self-center w-circle-icon rounded bg-contrast">
                        <i class="icon-phone text-white"></i></div>
                    <div class="media-body text-right">
                        <h4 class="text-white">{{ $hotel->bookings->count() }}</h4>
                        <span class="text-white">Total Booking</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
        <div class="card gradient-meridian">
            <div class="card-body">
                <div class="media">
                    <div class="align-self-center w-circle-icon rounded bg-contrast">
                        <i class="icon-pie-chart text-white"></i></div>
                    <div class="media-body text-right">
                        <h4 class="text-white">{{ $hotel->packages->count() }}</h4>
                        <span class="text-white">Total Packages</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
        <div class="card gradient-orange">
            <div class="card-body">
                <div class="media">
                    <div class="align-self-center w-circle-icon rounded bg-contrast">
                        <i class="icon-user text-white"></i></div>
                    <div class="media-body text-right">
                        <h4 class="text-white">{{ $hotel->images->count() }}</h4>
                        <span class="text-white">Total Images</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @canany(['edit-my-hotel', 'edit-hotel'])
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div id="accordion6">
                <div class="card mb-2 bg-success">
                    <div class="card-header bg-transparent">
                        <button class="btn btn-link shadow-none text-white" data-toggle="collapse" data-target="#collapse-system-setting" aria-expanded="true" aria-controls="collapse-16">
                            <b>Update Hotel Information</b>
                        </button>
                    </div>
                    <div id="collapse-system-setting" class="collapse" data-parent="#accordion6">
                        <div class="card-body text-white">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="text-uppercase">Update Hotel Information</h6>
                                    <hr>
                                    <div class="card">
                                        <div class="card-header">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <form id="package-submition-form">
                                                <div class="form-group">
                                                    <label for="hotel-name">Hotel name</label>
                                                    <input type="text" class="form-control form-control-square" id="hotel-name"  value="{{ $hotel->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="hotel-logo">Hotel logo</label>
                                                    <input type="file" accept="image/*" class="form-control form-control-square" id="hotel-logo">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="location-id">Location</label>
                                                        <select class="form-control form-control-square" id="location_id">
                                                            <option selected disabled>Chose Location</option>
                                                            @foreach($locations as $location)
                                                                <option @if($hotel->location_id == $location->id) selected style="background-color: #0dceec" @endif value="{{ $location->id }}">{{ $location->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="hotel-address">Hotel address</label>
                                                        <input type="text" class="form-control form-control-square" id="hotel-address" value="{{ $hotel->address }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hotel-phone">Hotel phone</label>
                                                    <input type="text" class="form-control form-control-square" id="hotel-phone" value="{{ $hotel->phone }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="hotel-facebook">Hotel facebook</label>
                                                    <input type="text" class="form-control form-control-square" id="hotel-facebook" value="{{ $hotel->facebook }}">
                                                </div><div class="form-group">
                                                    <label for="hotel-instagram">Hotel instagram</label>
                                                    <input type="text" class="form-control form-control-square" id="hotel-instagram" value="{{ $hotel->instagram }}">
                                                </div><div class="form-group">
                                                    <label for="hotel-twitter">Hotel twitter</label>
                                                    <input type="text" class="form-control form-control-square" id="hotel-twitter" value="{{ $hotel->twitter }}">
                                                </div><div class="form-group">
                                                    <label for="hotel-google">Hotel google</label>
                                                    <input type="text" class="form-control form-control-square" id="hotel-google" value="{{ $hotel->google }}">
                                                </div><div class="form-group">
                                                    <label for="hotel-youtube">Hotel youtube</label>
                                                    <input type="text" class="form-control form-control-square" id="hotel-youtube" value="{{ $hotel->youtube }}">
                                                </div><div class="form-group">
                                                    <label for="hotel-linkedin">Hotel linkedin</label>
                                                    <input type="text" class="form-control form-control-square" id="hotel-linkedin" value="{{ $hotel->linkedin }}">
                                                </div><div class="form-group">
                                                    <label for="hotel-whatsapp">Hotel whatsapp</label>
                                                    <input type="text" class="form-control form-control-square" id="hotel-whatsapp" value="{{ $hotel->whatsapp }}">
                                                </div><div class="form-group">
                                                    <label for="hotel-website">Hotel website</label>
                                                    <input type="text" class="form-control form-control-square" id="hotel-website" value="{{ $hotel->website }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="hotel-manager">Manager description</label>
                                                    <textarea class="form-control form-control-square summernote" rows="4" id="hotel-manager">{{ $hotel->manager }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hotel-description">Hotel description</label>
                                                    <textarea class="form-control form-control-square summernote" rows="4" id="hotel-description">{{ $hotel->description }}</textarea>
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
                                                    <button type="button" class="btn btn-danger btn-block waves-effect waves-light mb-1 update-hotel-info-btn">SUBMIT NOW</button>
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
            $(".update-hotel-info-btn").click(function (){
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

