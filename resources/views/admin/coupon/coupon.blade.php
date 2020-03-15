@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Starlight</a>
        <span class="breadcrumb-item active">Coupon</span>
        <span class="breadcrumb-item active">Coupon List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Coupon Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Coupon List
                <a href="#" class="btn btn-sm btn-warning" style="float: right" data-toggle="modal"
                    data-target="#modaldemo3">Add New</a>
            </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Coupon Code</th>
                            <th class="wd-15p">Coupon Percentage</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- @php($i = 1) --}}
                        @foreach($coupon as $key=>$row)
                            
                        
                        <tr>
                            <td> {{ $key+1 }}</td>
                            <td> {{ $row->coupon }} </td>
                            <td> {{ $row->discount }} % </td>
                            <td>
                                {{-- {{ route('edit.category', $row->id) }} --}}
                                <a href="{{ route('edit.coupon', $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('delete.coupon', $row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Coupon Add</h6>
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
            <form method="POST" action="{{ route('store.coupon') }}">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Coupon Code</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="coupon" placeholder="Coupon Code...." required="">
                       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Coupon Discont (%)</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="discount" placeholder="Coupon Discount...." required="">
                   
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
