@extends('backend.layouts.app')
@section("content")
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Product Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Product Form Section</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->


          <form action="{{ route('product.update',$edit->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                      <label for="">Product Name</label>
                      <input type="text" name="title" class="form-control" value="{{ $edit->title }}">
                  </div>
                </div>
              <!-- /.col -->
              <div class="col-md-6">
                
                <div class="form-group">
                    <label for="exampleInputFile">Product Category</label>
                    <select name="catagory" id="" class="form-control" required>
                      <option value="" selected disabled>== Choose Options ==</option>
                        @foreach ($category as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach  
                    </select>
                  </div>
              </div>
              <!-- /.col -->
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                      <label for="">Product Price</label>
                      <input type="text" name="price" class="form-control" value="{{ $edit->price }}">
                  </div>
                </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="">Product Discount</label>
                    <input type="text" name="discount_price" class="form-control" value="{{ $edit->discount_price }}"> 
                </div>
              </div>
              <!-- /.col -->
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                      <label for="">Product Quentity</label>
                      <input type="text" name="quantity" class="form-control" value="{{ $edit->quantity }}">
                  </div>
                </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="">Product Image</label>
                    <input type="file" name="image" class="form-control">
                    <img class="mt-1" src="{{ asset($edit->image) }}" alt="" style="height: 80px; width:140px;">
                </div>
              </div>
              
                <div class="form-group">
                    <input type="hidden" name="oldimage" class="form-control" value="{{ $edit->image }}">
                </div>
              
              <!-- /.col -->
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                      <label for="">Product Description</label>
                      <input type="text" name="description" class="form-control" value="{{ $edit->description }}">
                  </div>
                </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputFile">Publication<span class="text-danger">*</span></label>
                    <select name="status" id="" class="form-control ">  
                        <option value="1" @if ($edit->status==1) selected @endif>Active</option>
                        <option value="0" @if ($edit->status==0) selected @endif>Deactive</option>
                    </select>
                  </div><hr>
                
              </div>
              <!-- /.col -->
            </div>
            </div>
 
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Product</button>
              </div>
        </form>
            <!-- /.row -->

            
              
             
          
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection