@extends('backend.layouts.app')
@section('content')

    

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Slider Table</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Home Slider View </h3>
              <button type="button" class="btn btn-success btn-xs" style="float: right" data-toggle="modal" data-target="#modal-default">Add Category</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($slider as $key=>$row)
               
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td><img src="{{ asset($row->image) }}" alt="" style="height: 40px; width:60px;"></td>
                      <td>
                        @if ($row->status==1)
                            <button class="bg-success" style="width: 80px;"><a href="#">Active</a> </button>
                        @else
                            <button class="bg-primary" style="width: 80px;"><a href="#"> Deactive</a></button>
                        @endif
                      </td>
                      <td>
                       
                        <a href="{{ route('slider.delete',$row->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>
                      </td>
                      
                    </tr>
                  @endforeach
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

{{-- Create New Category Section --}}
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create Home Slider</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('home_slider,store') }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="card-body">

                  <div class="form-group">
                      <label for="">Slider Image <span class="text-danger">*</span></label>
                      <input type="file" name="image" class="form-control">
                      @error('image')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>

              
                  <div class="form-group">
                    <label for="exampleInputFile">Publication<span class="text-danger">*</span></label>
                    <select name="status" id="" class="form-control">
                      <option value="" selected disabled>== Choose Options ==</option>
                        
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                        
                    </select>
                    @error('status')
                        
                        <div class="text-danger">{{ $message }}</div>
                       
                    @enderror
                  </div><hr>
                     
                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>
          </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

<script type="text/javascript">
  $('.dropify').dropify();

</script>


@endsection