@extends('backend.layouts.app')
@section('content')

    

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Table</h1>
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
              <h3 class="card-title">All Users View </h3>
              <button type="button" class="btn btn-success btn-xs" style="float: right" data-toggle="modal" data-target="#modal-default">Add User</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>User Name</th>
                  <th>E-mail</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($all_user as $key=>$row)
               
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->email }}</td>
                      <td>{{ $row->phone }}</td>
                      <td>
                        @if ($row->status==1)
                            <p class="text-success" >Active</p>
                        @else
                            <p class="text-primary" >Deactive</p>
                        @endif
                      </td>
                      <td>
                        <a href="#" class="btn btn-info btn-xs edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editModal" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('user.delete',$row->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>
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
        <h4 class="modal-title">Add New User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('user.store') }}" method="post">
              @csrf

              <div class="card-body">

                  <div class="form-group">
                      <label for="">User Name <span class="text-danger">*</span></label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " placeholder="Name" value="{{old('name')}}">
                      @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="">E-mail <span class="text-danger">*</span></label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " placeholder="example@gmail.com" value="{{old('email')}}">
                      @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Phone <span class="text-danger">*</span></label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror " placeholder="01XXXXXXXXX" value="{{old('phone')}}">
                    @error('phone')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="">Address <span class="text-danger">*</span></label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror " placeholder="Address" value="{{old('address')}}">
                    @error('address')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror " placeholder="***********" value="{{old('password')}}">
                    @error('password')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

              
                  <div class="form-group">
                    <label for="exampleInputFile">Publication<span class="text-danger">*</span></label>
                    <select name="status" id="" class="form-control  @error('status') is-invalid @enderror " required>
                      <option value="" selected disabled>== Choose Options ==</option>
                        
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                        
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
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


{{-- edit modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_body">
        
      </div>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

<script type="text/javascript">
  $('.dropify').dropify();

</script>

<script type="text/javascript">
	$('body').on('click','.edit', function(){
		let cat_id=$(this).data('id');
		$.get("user/edit/"+cat_id, function(data){
			 $("#modal_body").html(data);
		});
	});

</script>


@endsection