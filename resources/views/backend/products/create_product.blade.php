@extends('backend.layouts.app')
@section("content")
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Product Form</h1>
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


          <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                      <label for="">Product Name<span class="text-danger">*</span></label>
                      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror " placeholder="Product Name" value="{{old('title')}}" required>
                      @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
              <!-- /.col -->
              <div class="col-md-6">
                
                <div class="form-group">
                    <label for="exampleInputFile">Product Category<span class="text-danger">*</span></label>
                    <select name="catagory" id="" class="form-control  @error('status') is-invalid @enderror ">
                      <option value="" selected disabled>== Choose Options ==</option>
                        @foreach ($category as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                        
                    </select>
                    @error('catagory')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
              </div>
              <!-- /.col -->
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                      <label for="">Product Price<span class="text-danger">*</span></label>
                      <input type="text" name="price" class="form-control @error('price') is-invalid @enderror " placeholder="Product Price" value="{{old('price')}}" required>
                      @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
              <!-- /.col -->
              <div class="col-md-6">
                
                <div class="form-group">
                    <label for="">Product Discount</label>
                    <input type="text" name="discount_price" class="form-control" placeholder="Product Discount" value="{{old('discount_price')}}">
                    
                </div>
              </div>
              <!-- /.col -->
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                      <label for="">Product Quentity<span class="text-danger">*</span></label>
                      <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror " placeholder="Product Quentity" value="{{old('quantity')}}" required>
                      @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
              <!-- /.col -->
              <div class="col-md-6">
                
                <div class="form-group">
                    <label for="">Product Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror " required>
                    @error('image')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>
              <!-- /.col -->
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                      <label for="">Product Description<span class="text-danger">*</span></label>
                      <input type="text" name="description" class="form-control @error('description') is-invalid @enderror " value="{{old('description')}}" required>
                      @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
              <!-- /.col -->
              <div class="col-md-6">
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
                
              </div>
              <!-- /.col -->
            </div>
            </div>


          
                 
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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