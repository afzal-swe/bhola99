@extends('backend.layouts.app')
@section('content')

    

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cart Table</h1>
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
              <h3 class="card-title">All Cart View </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  {{-- <th>Address</th> --}}
                  <th>Product_Title</th>
                  <th>Qunt</th>
                  <th>Price</th>
                
                </tr>
                </thead>
                <tbody>
                  @foreach ($cart as $key=>$row)
               
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td><img src="{{ asset($row->image) }}" alt="" style="height: 50px; width:50px;"></td>
                      <td>{{ $row->user_name }}</td>
                      <td>{{ $row->user_email }}</td>
                      {{-- <td>{{ $row->address }}</td> --}}
                      <td>{{ $row->user_phone }}</td>
                      <td>{{ $row->product_title }}</td>
                      <td>{{ $row->quantity }}</td>
                      <td>{{ $row->price }}</td>
                  
                    
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