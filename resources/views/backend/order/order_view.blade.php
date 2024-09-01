@extends('backend.layouts.app')
@section('content')

    

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Orders Table</h1>
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
              <h3 class="card-title">All Order View </h3>
              {{-- <div class="card-tools">

                <div class="input-group input-group-sm" style="width: 150px;">
                  <form action="{{ route('search') }}" method="get">
                    @csrf
                    <input type="text" name="search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default float-right">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div> --}}
              
              <div style="float: right">
                <form action="{{ route('search') }}" method="get">
                  @csrf
                  <input type="text" class="outline-primary" name="search" placeholder="Search">

                  <input type="submit" value="Search" class="btn btn-outline-primary">
                </form>
              </div>
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
                  {{-- <th>Address</th> --}}
                  <th>Product_Title</th>
                  <th>Qunt</th>
                  <th>Price</th>
                  <th>Payment Status</th>
                  <th>Delivery Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($order as $key=>$row)
               
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td><img src="{{ asset($row->image) }}" alt="" style="height: 50px; width:50px;"></td>
                      <td>{{ $row->first_name }}</td>
                      <td>{{ $row->email }}</td>
                      {{-- <td>{{ $row->address }}</td> --}}
                      <td>{{ $row->product_name }}</td>
                      <td>{{ $row->product_quantity }}</td>
                      <td>{{ $row->product_price }}</td>
                      <td>{{ $row->payment_status }}</td>
                      <td>
                        @if ($row->delivery_status == "1")
                            <a href="{{ route('product.delivery',$row->id) }}" class="btn btn-success">{{  "Delivery" }}</a>
                        @else
                            <a href="{{ route('product.delivery',$row->id) }}" class="btn btn-info">{{  "Processing" }}</a>
                        @endif
                        
                    </td>
                     
                      <td>
                        <a href="{{ route('order.delete',$row->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>
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