@push('header')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush
<div class="row">
    <div class="col-lg-12">
        <div id="accordion6">
            <div class="card mb-2 bg-success">
                <div class="card-header bg-transparent">
                    <button class="btn btn-link shadow-none text-white" data-toggle="collapse" data-target="#collapse-system-setting" aria-expanded="true" aria-controls="collapse-16">
                        <b>Add new packages</b>
                    </button>
                </div>
                <div id="collapse-system-setting" class="collapse" data-parent="#accordion6">
                    <div class="card-body text-white">
                        <div class="row">
                            <div class="col-lg-12">
                                <h6 class="text-uppercase">Add a new packages</h6>
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
                                                <label for="package-name">Package name</label>
                                                <input type="text" class="form-control form-control-square" id="package-name">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="service-id">Services</label>
                                                    <select class="form-control form-control-square" id="service-id">
                                                        <option selected disabled>Chose service</option>
                                                        @foreach($serviceCategories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="package-price">Price</label>
                                                    <input type="number" class="form-control form-control-square" id="package-price">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="package-image">Image</label>
                                                <input type="file" accept="image/*" class="form-control form-control-square" id="package-image">
                                            </div>
                                            <div class="form-group">
                                                <label for="package-description">Description</label>
                                                <textarea class="form-control form-control-square summernote" rows="4" id="package-description"></textarea>
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
                                                <button type="button" class="btn btn-danger btn-block waves-effect waves-light mb-1 submit-btn">Add a ne package</button>
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



<hr>

<div class="row">
    @foreach($hotel->packages as $package)
    <div class="col-lg-4">
        <div class="pricing-table">
            <div class="card border border-primary">
                <div class="card-body text-center">
                    <div class="price-title text-primary">{{ $package->name }}</div>
                    <h2 class="price text-primary"><small class="currency">$</small>{{ $package->price }}</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>4 GB</b> Ram</li>
                        <li class="list-group-item"><b>80 GB</b> Disk Space</li>
                        <li class="list-group-item">Monthly Backups</li>
                        <li class="list-group-item">Email Support</li>
                        <li class="list-group-item">24X7 Support</li>
                    </ul>
                    <a href="javascript:void();" class="btn btn-outline-primary my-3 btn-round">View More</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

<hr>

@canany(['edit-my-hotel', 'edit-hotel'])
    <script>
        $(document).ready(function() {
            //Show modal for add
            $('.submit-btn').click(function(){
                var formData = new FormData();
                formData.append('hotel', $('#hidden-id').val())
                formData.append('service', $('#service-id').val())
                formData.append('name', $('#package-name').val())
                formData.append('description', $('#package-description').val())
                formData.append('price', $('#package-price').val())
                formData.append('image', $('#package-image')[0].files[0])
                $.ajax({
                    method: 'POST',
                    url: "{{ route('backend.package.store') }}",
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
        });

    </script>
@endcanany
