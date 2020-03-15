@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Starlight</a>
        <span class="breadcrumb-item active">Brand</span>
        <span class="breadcrumb-item active">Brand List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Brand Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Brand Update
     
            </h6>

            <div class="table-wrapper">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                 {{-- end error message --}}
                <form method="POST" action="{{ route('update.brand', $brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="brand_name" value="{{ $brand->brand_name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Logo</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="brand_logo" value="{{ $brand->brand_name }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Old Logo</label>
                        <img src="{{URL::to($brand->brand_logo)}}" alt="" style="height:70px; width:90px;">
                        <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                        </div>

                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Update</button>
                        {{-- <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button> --}}
                    </div>
                </form>

            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
</div>



@endsection
