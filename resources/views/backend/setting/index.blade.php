@extends('backend.layouts.app')
@push('title') Setting @endpush
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
                        <li class="breadcrumb-item active" aria-current="page">Setting</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->

            <div class="row">
                @can('manage-advance-ownership')
                <div class="col-lg-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Advance Ownership</h5>
                            <p class="card-text text-danger">*If you activated advance ownership than you can use multi owner dor one hotel. Or Multi hotel for one owner. Or many hotel for many owner.</p>
                            <hr>
                            <div class="btn-group m-1">
                                <button type="button" class="btn btn-outline-success waves-effect waves-light  @if($setting->advance_ownership == 1) active disabled @else advance-ownership @endif" >Activated</button>
                                <button type="button" class="btn btn-outline-danger waves-effect waves-light  @if($setting->advance_ownership == 0) active disabled @else advance-ownership @endif">Deactivated</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan
            </div>

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
            @can('manage-advance-ownership')
            //Change advance ownership
            $('.advance-ownership').click(function (){
                $.get("{{ route('backend.setting.advanceOwnership') }}", function(data){
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
                });
            });
            @endcan

        });

    </script>

@endsection
@push('footer')

@endpush


