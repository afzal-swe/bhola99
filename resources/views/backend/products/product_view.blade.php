@extends('backend.layouts.app')
@section('content')

    

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products Table</h1>
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
              <h3 class="card-title">All Product View </h3>
              <a href="{{ route('products.create') }}" type="button" class="btn btn-success btn-xs" style="float: right" >Add Category</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>price</th>
                  <th>discount_price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($product as $key=>$row)
               
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td><img src="{{ asset($row->image) }}" alt="" style="height: 40px; width:60px;"></td>
                      <td>{{ $row->title }}</td>
                      <td>{{ $row->title }}</td>
                      <td>{{ $row->price }}</td>
                      <td>{{ $row->discount_price }}</td>
                      <td>
                        @if ($row->status==1)
                            <p class="text-success" >Active</p>
                        @else
                            <p class="text-primary" >Deactive</p>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('product.edit',$row->slug) }}" class="btn btn-info btn-xs edit" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('product.delete',$row->slug) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>
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






@endsection