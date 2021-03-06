@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    crossorigin="anonymous">

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Post Section</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">New Post Add <a href="#" class="btn btn-success btn-sm pull-right">All Post</a>
            </h6>

            <form action="{{route('update.post',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Post Title (English): <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="post_title_en"
                                    value="{{$post->post_title_en}}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Post Title (Bangla) <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="post_title_bn"
                                    value="{{$post->post_title_bn}}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Category"
                                    name="category_id">
                                    <option label="Choose Category" disabled selected>--Choose Category--</option>
                                    @foreach($post_category as $row)
                                    <option value="{{ $row->id }}" @php if($row->id == $post->category_id)
                                        {echo"selected";}@endphp>
                                        {{ $row->category_name_en }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Post Details (English)<span
                                        class="tx-danger">*</span></label>
                                <textarea class="form-control" id="summernote" name="details_en">
                   	              {{$post->details_en}}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Post Details (Bangla)<span
                                        class="tx-danger">*</span></label>
                                <textarea class="form-control" id="summernote1" name="details_bn">
                                   {{$post->details_bn}}
                     
                                </textarea>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <lebel>Post Image (Main Thumbnail)<span class="tx-danger">*</span></lebel>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="post_image"
                                    onchange="readURL(this);" accept="image/*">
                                <span class="custom-file-control"></span>
                                <img src="#" id="one">
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <lebel>Old Image<span class="tx-danger">*</span></lebel>
                            <label class="custom-file">
                                <img src="{{ URL::to($post->post_image) }}" style="height: 80px; width: 140px;">
                                <input type="hidden" name="old_image" value="{{ $post->post_image }}">
                            </label>
                        </div>

                    </div><!-- row -->
                    <br>
                    <hr>


                </div><!-- row -->
                <br>
                <hr>


                <br><br>
                <hr>
                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5" type="submit">Submit </button>
                </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
        </form>
    </div><!-- card -->

</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script> --}}




<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
{{-- <script type="text/javascript">
	function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#two')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
	function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#three')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script> --}}
@endsection
