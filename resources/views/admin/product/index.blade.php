@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Starlight</a>
        <span class="breadcrumb-item active">Product</span>
        <span class="breadcrumb-item active">Product List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Product Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Product List
                <a href="{{ route('add.product') }}" class="btn btn-sm btn-warning" style="float: right">Add New</a>
            </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">SL.</th>
                            <th class="wd-15p">Product ID</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Brand</th>
                            <th class="wd-15p">Quantity</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- @php($i = 1) --}}
                        @foreach($product as $key=>$row)
                            
                        
                        <tr>
                            <td> {{ $key+1 }}</td>
                            <td> {{ $row->product_code }} </td>
                            <td> {{ $row->product_name }} </td>
                            <td> <img src="{{ URL::to($row->image_one)}}" alt="brand logo" height="50px" width="50px"></td>
                            <td> {{ $row->category->category_name }} </td>
                            <td> {{ $row->brand->brand_name }} </td>
                            <td> {{ $row->product_quantity }} </td>
                            <td> 
                                @if($row->status == 1)
                                 <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>

                                @endif
                            </td>

                            <td>
                                <a href=" {{ route('edit.product', $row->id) }} " class="btn btn-sm btn-info" title="Edit" ><i class="fa fa-edit"></i></a>
                                <a href=" {{ route('delete.product', $row->id) }} " class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                <a href=" {{ route('view.product', $row->id) }} " class="btn btn-sm btn-warning" title="View"><i class="fa fa-eye"></i></a>
                                @if ($row->status == 1)
                                <a href=" {{ route('inactive.product', $row->id) }} " class="btn btn-sm btn-danger"  title="Inactive"><i class="fa fa-thumbs-down"></i></a>
                                @else
                                <a href=" {{ route('active.product', $row->id) }} " class="btn btn-sm btn-success"  title="active"><i class="fa fa-thumbs-up"></i></a>

                                @endif
                                </td>
                        </tr>
                        {{-- @php($i++) --}}

                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
</div>


<!-- Modal -->
<div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Brand</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- error message --}}
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
            <form method="POST" action="{{ route('store.brand') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="brand_name" placeholder="Brand">
                        <small id="emailHelp" class="form-text text-muted">You Can Add New Brand</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Logo</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="brand_logo" placeholder="Brand Logo">
                        <small id="emailHelp" class="form-text text-muted">You Can Add New Brand</small>
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div>

@endsection
