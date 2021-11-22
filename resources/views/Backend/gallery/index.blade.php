@extends('layouts.backend.app')
@push('meta')
@endpush
@section('title', 'Brand Name')
@push('pagecss')
<link rel="stylesheet" type="text/css" href="{{asset('BackendAsset/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" type="text/css" href="{{ asset('backendAsset/assets/css/image-uploader.min.css') }}">

@endpush
@push('css')
@endpush
@section('breadcrumb')
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-7 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <form class="form form-vertical" method="POST"  action="{{route('admin.gallery.store')}}" enctype="multipart/form-data">
                      @csrf
                            @include('Backend.gallery.part.form')
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-5">
            <div class="card">
                <div class="card-body">
                    @include('Backend.gallery.part.list')
                </div>
            </div>
        </div>
    </div>
@endsection
@push('pagejs')
<script src="{{asset('BackendAsset/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('BackendAsset/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backendAsset/assets/js/image-uploader.min.js') }}"></script>
<script>
    $('.input-images-1').imageUploader();
</script>

@endpush
@push('js')

<script src="{{asset('BackendAsset/app-assets/js/scripts/datatables/datatable.js')}}"></script>

<script>
    function deleteCategory(id){
      var brand =  confirm('are you Sure You Want to Delete this Brand');
      if(brand){
        $.ajax({
            url: "/admin/brand/delete/"+id,
            type: 'GET',
            success: function(res) {
                location.reload();
            }
        });
      }
    }

</script>

@endpush
