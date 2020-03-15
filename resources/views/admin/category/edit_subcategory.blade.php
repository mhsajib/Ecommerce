@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Starlight</a>
    <span class="breadcrumb-item active"><a href="{{ route('categories')}}"><b>Category</b></a></span>
        <span class="breadcrumb-item active">Category List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Category Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Category Update
     
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
                <form method="POST" action="{{ route('update.subcategory', $subcategory->id) }}">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub Category Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="subcategory_name" value="{{ $subcategory->subcategory_name }}">
                            <small id="emailHelp" class="form-text text-muted">You Can Add New Categories</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select class="form-control" name="category_id">
                                @foreach ($category as $row)
                            <option value="{{ $row->id }}" <?php if( $row->id == $subcategory->category_id ){echo "selected";}?>>{{  $row->category_name   }}</option>
                                @endforeach
                            </select>
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
